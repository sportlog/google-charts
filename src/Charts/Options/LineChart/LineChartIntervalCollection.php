<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\LineChart;

use ArrayObject;
use JsonSerializable;

/**
 * LineChart intervals.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/intervals#combining-interval-styles
 */
class LineChartIntervalCollection implements JsonSerializable
{
    private array $items = [];

    /**
     * Adds an interval with the given index.
     *
     * @param LineChartInterval $item
     * @param string $index
     * @return void
     */
    public function add(LineChartInterval $item, string $index): void
    {
        $this->items[$index] = $item;
    }

    /**
     * Must be encoded with the index as property name.
     * 
     * @example 
     * {
     *    'i0': { 'color': '#4374E0', 'style':'bars', 'barWidth':0, 'lineWidth':4, 'pointSize':10, 'fillOpacity':1 },
     *    'i1': { 'color': '#E49307', 'style':'bars', 'barWidth':0, 'lineWidth':4, 'pointSize':10, 'fillOpacity':1 },
     *    'i2': { 'style':'area', 'curveType':'function', 'fillOpacity':0.3 }},
     * }
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return new ArrayObject($this->items);
    }
}
