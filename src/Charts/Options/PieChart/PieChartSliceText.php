<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

enum PieChartSliceText: string {
    case Percentage = 'percentage';
    case Value = 'value';
    case Label = 'label';
    case None = 'none';
}