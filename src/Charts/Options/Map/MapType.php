<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Map;

enum MapType: string
{
    case Normal = 'normal';
    case Terrain = 'terrain';
    case Satellite = 'satellite';
}
