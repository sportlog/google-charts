<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

enum ChartAnimationEase: string
{
    case Linear = 'linear';
    case In = 'in';
    case Out = 'out';
    case InAndOut = 'inAndOut';
}
