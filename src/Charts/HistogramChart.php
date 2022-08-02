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
use Sportlog\GoogleCharts\Charts\Options\HistogramChart\HistogramChartOptions;

/**
 * Histogram chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/histogram
 */
class HistogramChart extends GoogleChart
{
    /**
     * Creates a new histogram chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param HistogramChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly HistogramChartOptions $options = new HistogramChartOptions()
    ) {
        parent::__construct($id, ChartType::Histogram, $data, $options);
    }
}
