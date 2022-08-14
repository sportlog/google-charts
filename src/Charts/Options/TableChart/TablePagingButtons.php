<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\TableChart;

enum TablePagingButtons: string {
    case Both = 'both';
    case Prev = 'prev';
    case Next = 'next';
    case Auto = 'auto';
}