<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Google chart class holding columns and rows.
 */
class GoogleChart implements JsonSerializable
{
    /**
     * Chart columns
     */
    private array $cols = [];
    /**
     * Chart rows
     */
    private array $rows = [];

   /**
    * Creates a new chart.
    *
    * @param string $id
    * @param ChartType $chartType
    * @param array $options
    */
    public function __construct(private readonly string $id, private readonly ChartType $chartType, private array $options = [])
    {
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
     * Sets a chart option. If an option with the given
     * key already exists, it is overwritten.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setOption(string $key, mixed $value): void
    {
        $this->options[$key] = $value;
    }

    /**
     * Adds a row.
     */
    public function addRow(array $values, array $formatted = []): void
    {
        if (count($this->cols) === 0) {
            throw new InvalidArgumentException("Must add columns before adding rows");
        }

        $this->rows[] = new Row($values, $formatted);
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
            'chartType' => $this->chartType->value
        ];
    }
}
