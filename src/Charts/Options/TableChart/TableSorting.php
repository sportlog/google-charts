<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\TableChart;

enum TableSorting: string {
    case Enable = 'enable';
    case Event = 'event';
    case Disable = 'disable';
}