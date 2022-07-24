<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Base\{ChartDesign, ChartType, GoogleChart};
use Sportlog\GoogleCharts\Charts\Options\LineChart\LineChartOptions;

/**
 * Line chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/linechart
 */
class LineChart extends GoogleChart
{
    /**
     * Creates a new line chart instance
     *
     * @param string $id
     * @param LineChartOptions $options
     */
    public function __construct(
        string $id,
        public readonly LineChartOptions $options = new LineChartOptions(),
        ChartDesign $design = ChartDesign::Classic
    ) {
        parent::__construct($id, ChartType::Line, $options, $design);
    }
}
