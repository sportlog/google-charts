<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Trendline;

use ArrayObject;
use JsonSerializable;

class ChartTrendlineCollection implements JsonSerializable
{
    private array $trendlines = [];

    /**
     * Adds a trendline with the given index.
     *
     * @param ChartTrendline $trendline
     * @param int $index
     * @return void
     */
    public function add(ChartTrendline $trendline, int $index): void
    {
        $this->trendlines[$index] = $trendline;
    }

    /**
     * Must be encoded with the index as property name.
     * 
     * @example 
     * {
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
        return new ArrayObject($this->trendlines);
    }
}
