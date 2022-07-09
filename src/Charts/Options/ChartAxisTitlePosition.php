<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

enum ChartAxisTitlePosition : string {
    case In = 'in';
    case Out = 'out';
    case None = 'none';
}