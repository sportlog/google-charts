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
use Sportlog\GoogleCharts\Charts\Options\AreaChart\AreaChartOptions;

/**
 * Area chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/areachart
 */
class AreaChart extends GoogleChart {
    /**
     * Creates a new area chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param AreaChartOptions $options
     */
    public function __construct(string $id, DataTable $data, public readonly AreaChartOptions $options = new AreaChartOptions())
    {
        parent::__construct($id, ChartType::Area, $data, $options);
    }
}