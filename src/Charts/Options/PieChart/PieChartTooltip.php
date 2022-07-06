<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use TextStyle;

class PieChartTooltip
{
    public function __construct(
        public readonly bool $isHtml,
        public readonly PieChartTrigger $trigger,
        public readonly ?TextStyle $textStyle = null
    ) {
    }
}
