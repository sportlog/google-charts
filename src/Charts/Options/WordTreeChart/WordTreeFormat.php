<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\WordTreeChart;

enum WordTreeFormat: string {
    case Implicit = 'implicit';
    case Explicit = 'explicit';
}