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
use Sportlog\GoogleCharts\Charts\Options\SteppedAreaChart\SteppedAreaChartOptions;

/**
 * SteppedArea chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/steppedareachart
 */
class SteppedAreaChart extends GoogleChart {
    /**
     * Creates a new stepped area chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param SteppedAreaChartOptions $options
     */
    public function __construct(string $id, DataTable $data, public readonly SteppedAreaChartOptions $options = new SteppedAreaChartOptions())
    {
        parent::__construct($id, ChartType::SteppedArea, $data, $options);
    }
}