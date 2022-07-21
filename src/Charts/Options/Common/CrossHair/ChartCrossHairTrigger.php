<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\CrossHair;

enum ChartCrossHairTrigger : string {
    case Both = 'both';
    case Focus = 'focus';
    case Selection = 'selection';
}