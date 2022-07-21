<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use ArrayObject;
use JsonSerializable;

class PieChartSliceCollection implements JsonSerializable
{
    private array $slices = [];

    /**
     * Adds a slice with the given index.
     *
     * @param PieChartSlice $slice
     * @param int $index
     * @return void
     */
    public function add(PieChartSlice $slice, int $index): void
    {
        $this->slices[$index] = $slice;
    }

    /**
     * Must be encoded with the index as property name.
     * 
     * @example 
     * "slices": {
     *   "1": {
     *       "offset": 3.1
     *   },
     *   "4": {
     *       "opacity": 3.4,
     *       "color": "red",
     *   },
     *   "2": {
     *       "opacity": 3.4
     *   }
     * }
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return new ArrayObject($this->slices);
    }
}
