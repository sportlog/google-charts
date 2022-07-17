<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Trendline;

enum ChartTrendline : string
{
    case Linear = 'linear';
    case Exponential = 'exponential';
    case Polynomial = 'polynomial';
}