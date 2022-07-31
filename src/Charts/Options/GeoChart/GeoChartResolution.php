<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GeoChart;

/**
 * GeoChartResolution
 */
enum GeoChartResolution : string {
    case Countries = 'countries';
    case Provinces = 'provinces';
    case Metros = 'metros';
}
