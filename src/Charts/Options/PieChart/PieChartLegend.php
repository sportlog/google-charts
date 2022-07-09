<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use Sportlog\GoogleCharts\Charts\Options\{ChartLegendAlignment, ChartLegendPosition, ChartTextStyle};

/**
 * An object with members to configure various aspects of the legend.
 */
class PieChartLegend {
    public function __construct(
        public ?ChartLegendAlignment $alignment = null,
        public ?ChartLegendPosition $position = null,
        public ?int $maxLines = null,
        public ?ChartTextStyle $textStyle = null
    )
    {
    }
}