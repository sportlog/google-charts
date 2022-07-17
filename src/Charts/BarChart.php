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
use Sportlog\GoogleCharts\Charts\Options\BarChart\BarChartOptions;

/**
 * Bar chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
class BarChart extends GoogleChart
{
    /**
     * Creates a new bar chart instance
     *
     * @param string $id
     * @param BarChartOptions $options
     */
    public function __construct(
        string $id,
        public readonly BarChartOptions $options = new BarChartOptions(),
        public readonly ChartDesign $design = ChartDesign::Classic
    ) {
        parent::__construct($id, ChartType::Bar, $options, $design);
    }
}
