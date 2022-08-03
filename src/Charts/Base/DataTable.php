<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

use DateTimeInterface;
use Exception;
use InvalidArgumentException;
use JsonSerializable;

/**
 * Data table holding both rows and columns.    
 */
class DataTable implements JsonSerializable
{
    /**
     * Chart columns
     *
     * @var Column[]
     */
    private array $cols = [];

    /**
     * Chart rows
     *
     * @var Row[]
     */
    private array $rows = [];

    /**
     * Adds a row.
     */
    public function addRow(array $values, array $formatted = []): void
    {
        if (count($this->cols) === 0) {
            throw new InvalidArgumentException('Must add columns before adding rows');
        }
        // Google charts do not draw if column count does not match the values count.
        if (count($values) !== count($this->cols)) {
            throw new InvalidArgumentException('Must provide exactly one value per column');
        }
        if (!array_is_list($values)) {
            throw new InvalidArgumentException('Values must not be an associative array');
        }

        foreach ($values as $key => $value) {
            if (is_null($value)) {
                continue;
            }

            $columnType = $this->cols[$key]->type;
            if (!$this->matchType($columnType, $value)) {
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
        $this->cols[] = $column;
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        return [
            'cols' => $this->cols,
            'rows' => $this->rows
        ];
    }

    private function matchType(ColumnType $colType, mixed $value): bool
    {
        switch ($colType) {
            case ColumnType::Bool:
                return is_bool($value);

            case ColumnType::String:
                return is_string($value);

            case ColumnType::Date:
            case ColumnType::DateTime:
                return ($value instanceof DateTimeInterface);

            case ColumnType::Number:
                // Do not use is_numeric as it allows numeric strings
                // which would not be handled correctly by google charts library
                return is_int($value) || is_float($value);

            case ColumnType::TimeOfDay:
                // The DataTable timeofday column data type takes an array of either 3 or 4 numbers, 
                // representing hours, minutes, seconds, and optionally milliseconds, respectively. 
                return is_array($value) &&
                    (count($value) === 3 || count($value) === 4) &&
                    array_reduce($value, fn ($acc, $item) => $acc && is_int($item), true);

            default:
                throw new Exception("unhandled column type {$colType->value}");
        }
    }
}