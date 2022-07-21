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
use Sportlog\GoogleCharts\Charts\Options\Common\ChartBaseOptions;

/**
 * Google chart class holding columns and rows.
 */
abstract class GoogleChart implements JsonSerializable
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
     * Creates a new chart.
     *
     * @param string $id
     * @param ChartType $chartType
     * @param ChartBaseOptions $options
     * @param ChartDesign $design
     */
    public function __construct(
        private readonly string $id,
        private readonly ChartType $chartType,
        private readonly ChartBaseOptions $options,
        private readonly ChartDesign $design = ChartDesign::Classic
    ) {
    }

    /**
     * Gets the id of the chart
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

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
            $columnType = $this->cols[$key]->type;
            if (!$this->matchType($columnType, $value)) {
                throw new InvalidArgumentException("Value with index {$key} does not match the column type. Expected columnType is {$columnType->value}");
            }
        }

        $this->rows[] = new Row($values, $formatted);
    }

    public function addRows(array ...$values): void {
        foreach ($values as $value) {
            $this->addRow($value);
        }
    }

    /**
     * Adds a column.
     *
     * @param string $label
     * @param ColumnType $type
     * @return void
     */
    public function addColumn(string $label, ColumnType $type): void
    {
        $this->cols[] = new Column($type, $label);
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        return [
            'data' => [
                'cols' => $this->cols,
                'rows' => $this->rows
            ],
            'options' => $this->options,
            'id' => $this->getId(),
            'type' => $this->chartType,
            'design' => $this->design
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
                // do not use is_numeric as it allows numeric strings
                // which would not be handled correctly by google charts library
                return is_int($value) || is_float($value);

            case ColumnType::TimeOfDay:
                // The DataTable timeofday column data type takes an array of either 3 or 4 numbers, 
                // representing hours, minutes, seconds, and optionally milliseconds, respectively. 
                return is_array($value) &&
                    (count($value) === 3 || count($value) === 4) &&
                    array_reduce($value, fn ($acc, $item) => $acc && is_int($item), true);

            default:
                throw new Exception("unhandled column type {$colType}");
        }
    }
}
