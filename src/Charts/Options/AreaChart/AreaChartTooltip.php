<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\AreaChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{Tooltip\ChartTooltip, Tooltip\ChartTrigger, ChartTextStyle};

class AreaChartTooltip extends ChartTooltip {
    public function __construct(
        bool $isHtml,
        ChartTrigger $trigger = null,
        ?ChartTextStyle $textStyle = null,
        public readonly bool $showColorCode,
        public readonly bool $ignoreBounds,
    ) {
        parent::__construct($isHtml, $trigger, $textStyle);
    }
}