<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

enum ChartStacked : string {
    case Percent = 'percent';
    case Relative = 'relative';
    case Absolute = 'absolute';
}