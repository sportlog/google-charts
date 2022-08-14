<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Data table holding both rows and columns.    
 */
class DataTable implements JsonSerializable
{
    /**
     * Columns
     *
     * @var Column[]
     */
    private array $columns = [];
    /**
     * Rows
     *
     * @var Row[]
     */
    private array $rows = [];

    /**
     * Creates columns and rows from the two dimensional array.
     * Treats the first row as column labels and infers the column
     * type from the second row (= first data row.)
     *
     * @param array $data Array of arrays containing data
     * @param bool $firstRowIsData Indicates if the first row is treated as data. If false
     * first row is used for column labels.
     * @return self
     */
    public static function fromArray(array $data, $firstRowIsData = false): self
    {
        if (count($data) < 2) {
            throw new InvalidArgumentException('$data must be a two dimensional array and contain at least two entries');
        }

        // If first row does not contain data, pop it for labeling
        $labels = $firstRowIsData ? [] : array_shift($data);
        // Infer the column type of the columsn from the first data row
        $columns = array_map(fn (mixed $value, $label) => new Column(ColumnType::fromValue($value), $label), $data[0], $labels);

        return new self($columns, $data);
    }

    /**
     * Creates a new datatable
     *
     * @param Column[] $columns
     * @param mixed[][] $values
     */
    public function __construct(array $columns = [], array $values = [])
    {
        foreach ($columns as $column) {
            $this->addColumn($column);
        }
        $this->addRows(...$values);
    }

    /**
     * Adds a row.
     */
    public function addRow(array $values, array $formatted = []): void
    {
        if (count($values) === 0) {
            return;
        }
        if (count($this->columns) === 0) {
            throw new InvalidArgumentException('Must add columns before adding rows');
        }
        // Google charts do not draw if column count does not match the values count.
        if (count($values) !== count($this->columns)) {
            throw new InvalidArgumentException('Must provide exactly one value per column');
        }
        if (!array_is_list($values)) {
            throw new InvalidArgumentException('Values must not be an associative array');
        }

        foreach ($values as $key => $value) {
            if (is_null($value)) {
                continue;
            }

            /** @var ColumnType $columnType */
            $columnType = $this->columns[$key]->type;
            if (!$columnType->equalsValueType($value)) {                
                throw new InvalidArgumentException("Value with index {$key} does not match the column type. Expected columnType is {$columnType->value}");
            }
        }

        $this->rows[] = new Row($values, $formatted);
    }

    /**
     * Add multiple rows at once.
     * Use addRow() if you need to supply formatted values.
     *
     * @param array ...$values
     * @return void
     */
    public function addRows(array ...$values): void
    {
        foreach ($values as $value) {
            $this->addRow($value);
        }
    }

    /**
     * Adds a column.
     *
     * @return void
     */
    public function addColumn(Column $column): void
    {
        $this->columns[] = $column;
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        return [
            'cols' => $this->columns,
            'rows' => $this->rows
        ];
    }
}
