<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\LineChart;

/**
 * LineChart interval style.
 */
enum LineChartIntervalStyle: string
{
    case Area = 'area';
    case Bars = 'bars';
    case Boxes = 'boxes';
    case Line = 'line';
    case Points = 'points';
    case Sticks = 'sticks';
}
