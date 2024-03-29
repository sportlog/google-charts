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
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartOptions;

/**
 * Pie chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/piechart
 */
class PieChart extends GoogleChart
{
    /**
     * Creates a new pie chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param PieChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly PieChartOptions $options = new PieChartOptions()
    ) {
        parent::__construct($id, ChartType::Pie, $data, $options);
    }
}
