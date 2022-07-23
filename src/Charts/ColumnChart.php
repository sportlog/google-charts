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
use Sportlog\GoogleCharts\Charts\Options\ColumnChart\ColumnChartOptions;

/**
 * Column chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/columnchart
 */
class ColumnChart extends GoogleChart
{
    /**
     * Creates a new column chart instance
     *
     * @param string $id
     * @param ColumnChartOptions $options
     */
    public function __construct(
        string $id,
        public readonly ColumnChartOptions $options = new ColumnChartOptions(),
        ChartDesign $design = ChartDesign::Classic
    ) {
        parent::__construct($id, ChartType::Column, $options, $design);
    }
}
