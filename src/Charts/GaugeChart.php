<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Base\{ChartType, DataTable, GoogleChart};
use Sportlog\GoogleCharts\Charts\Options\GaugeChart\GaugeChartOptions;

/**
 * Gauge chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/gaugechart
 */
class GaugeChart extends GoogleChart
{
    /**
     * Creates a new Gauge chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param GaugeChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly GaugeChartOptions $options = new GaugeChartOptions()
    ) {
        parent::__construct($id, ChartType::Gauge, $data, $options);
    }
}
