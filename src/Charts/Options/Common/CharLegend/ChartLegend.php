<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend;

use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;

/**
 * An object with members to configure various aspects of the legend.
 */
class ChartLegend {
    public function __construct(
        public ?ChartLegendAlignment $alignment = null,
        public ?ChartLegendPosition $position = null,
        public ?int $maxLines = null,
        public ?ChartTextStyle $textStyle = null,
        public ?int $pageIndex = null
    )
    {
    }
}