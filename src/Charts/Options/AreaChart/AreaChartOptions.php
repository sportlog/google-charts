<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\AreaChart;

use Sportlog\GoogleCharts\Charts\Options\{ChartAnimation, ChartBaseOptions};

/**
 * AreaChart ptions.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/areachart#configuration-options
 */
class AreaChartOptions extends ChartBaseOptions {
    public ?AreaChartAggregationTarget $aggregationTarget = null;
    public ?ChartAnimation $animation = null;
}