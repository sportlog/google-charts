<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

use JsonSerializable;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSizeable;

/**
 * Google chart class holding columns and rows.
 */
abstract class GoogleChart implements JsonSerializable
{
    /**
     * Creates a new chart.
     *
     * @param string $id
     * @param ChartType $chartType
     * @param DataTable $data
     * @param ChartSizeable $options
     * @param ChartDesign $design
     */
    public function __construct(
        private readonly string $id,
        private readonly ChartType $chartType,
        private readonly DataTable $data,
        private readonly ChartSizeable $options,
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
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        return [
            'data' => $this->data,
            'options' => $this->options,
            'id' => $this->getId(),
            'type' => $this->chartType,
            'design' => $this->design
        ];
    }
}
