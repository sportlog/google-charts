<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use Sportlog\GoogleCharts\Charts\Options\{ChartArea, ChartBackgroundColor};

class PieChartArea extends ChartArea
{
    public function __construct(
        public readonly ?ChartBackgroundColor $backgroundColor = null,
        string|int|null $left = null,
        string|int|null $top = null,
        string|int|null $width = null,
        string|int|null $height = null,
        public readonly ?array $colors = null,
    ) {
        parent::__construct($left, $top, $width, $height);
    }
}
