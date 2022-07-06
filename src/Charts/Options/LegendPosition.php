<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

enum LegendPosition: string {
    case Bottom = 'bottom';
    case Labeled = 'labeled';
    case Left = 'left';
    case Right = 'right';
    case Top = 'top';
    case None = 'none';
}