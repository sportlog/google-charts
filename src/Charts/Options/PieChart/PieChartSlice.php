<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

class PieChartSlice
{
    public function __construct(
        public readonly ?string $color = null,
        public readonly ?float $offset = null,
        public readonly ?string $textStyle = null
    ) {
    }
}
