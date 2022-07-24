<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

use ArrayObject;
use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartSeriesOptionsCollection extends NotNullSerializer {
    private array $items = [];

    /**
     * Adds chart series options with the given index.
     *
     * @param ChartSeriesOptions $options
     * @param int $index
     * @return void
     */
    public function add(ChartSeriesOptions $options, int $index): void
    {
        $this->items[$index] = $options;
    }

    /**
     * Must be encoded with the index as property name.
     * 
     * @example 
     * "trendlines": {
     *   "1": {
     *       "lineWidth": 2,
     *       "opacity": 3.1
     *   },
     *   "4": {
     *       "degree": 2,
     *       "opacity": 3.4
     *   },
     *   "2": {
     *       "color": "red",
     *       "opacity": 3.4
     *   }
     * }
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return new ArrayObject($this->items);
    }
}