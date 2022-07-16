<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\AreaChart;

enum AreaChartAggregationTarget: string {
    case Categories = 'categories';
    case Series = 'series';
    case Auto = 'auto';
    case None = 'none';
}