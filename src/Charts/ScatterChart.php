<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Base\{ChartDesign, ChartType, DataTable, GoogleChart};
use Sportlog\GoogleCharts\Charts\Options\ScatterChart\ScatterChartOptions;

/**
 * Scatter chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/scatterchart
 */
class ScatterChart extends GoogleChart
{
    /**
     * Creates a new scatter chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param ScatterChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly ScatterChartOptions $options = new ScatterChartOptions(),
        ChartDesign $design = ChartDesign::Classic
    ) {
        parent::__construct($id, ChartType::Scatter, $data, $options, $design);
    }
}
