<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\CrossHair;

enum ChartCrossHairOrientation : string {
    case Both = 'both';
    case Horizontal = 'horizontal';
    case Vertical = 'vertical';
}