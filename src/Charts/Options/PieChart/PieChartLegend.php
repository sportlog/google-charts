<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use LegendAlignment;
use Sportlog\GoogleCharts\Charts\Options\LegendPosition;
use TextStyle;

/**
 * An object with members to configure various aspects of the legend.
 */
class PieChartLegend {
    public function __construct(
        public ?LegendAlignment $alignment = null,
        public ?LegendPosition $position = null,
        public ?int $maxLines = null,
        public ?TextStyle $textStyle = null
    )
    {
    }
}