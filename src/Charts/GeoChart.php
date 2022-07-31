<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Base\{ChartType, GoogleChart};
use Sportlog\GoogleCharts\Charts\Options\GeoChart\GeoChartOptions;

/**
 * Geo Chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/geochart
 */
class GeoChart extends GoogleChart
{
     /**
     * Creates a new Geo chart instance
     *
     * @param string $id
     * @param GeoChartOptions $options
     */
    public function __construct(
        string $id,
        public readonly GeoChartOptions $options = new GeoChartOptions()
    ) {
        parent::__construct($id, ChartType::Geo, $options);
    }
}