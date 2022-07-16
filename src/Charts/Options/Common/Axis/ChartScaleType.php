<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Axis;

enum ChartScaleType: string
{
    case Log = 'log';
    case MirrorLog = 'mirrorLog';
}
