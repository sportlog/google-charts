<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

enum ChartSeriesType : string {
    case Line = 'line';
    case Area = 'area';
    case Bars = 'bars';
    case Candlesticks = 'candlesticks';
    case SteppedArea = 'steppedArea';
}