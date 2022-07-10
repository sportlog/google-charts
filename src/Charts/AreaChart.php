<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\AreaChart\AreaChartOptions;
use Sportlog\GoogleCharts\Charts\Base\{ChartType, GoogleChart};

/**
 * Area chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/areachart
 */
class AreaChart extends GoogleChart {
    /**
     * Creates a new area chart instance
     *
     * @param string $id
     * @param AreaChartOptions $options
     */
    public function __construct(string $id, public readonly AreaChartOptions $options = new AreaChartOptions())
    {
        parent::__construct($id, ChartType::Area, $options);
    }
}