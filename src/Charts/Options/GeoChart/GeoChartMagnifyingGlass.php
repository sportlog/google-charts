<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GeoChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * GeoChartMagnifyingGlass.
 */
class GeoChartMagnifyingGlass extends NotNullSerializer
{
    public function __construct(
        public ?bool $enable = null,
        public ?float $zoomFactor = null
    ) {
    }
}
