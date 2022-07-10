<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

enum ChartPointShape : string {
    case Circle = 'circle';
    case Triangle = 'triangle';
    case Square = 'square';
    case Diamond = 'diamond';
    case Star = 'star';
    case Polygon = 'polygon';
}