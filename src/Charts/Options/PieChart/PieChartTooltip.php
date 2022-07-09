<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use Sportlog\GoogleCharts\Charts\Options\ChartTextStyle;

class PieChartTooltip
{
    public function __construct(
        public readonly bool $isHtml,
        public readonly PieChartTrigger $trigger,
        public readonly ?ChartTextStyle $textStyle = null
    ) {
    }
}
