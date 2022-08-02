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
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineChartOptions;

/**
 * Timeline chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/timeline
 */
class TimelineChart extends GoogleChart
{
    /**
     * Creates a new timeline chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param TimelineChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly TimelineChartOptions $options = new TimelineChartOptions()
    ) {
        parent::__construct($id, ChartType::Timeline, $data, $options);
    }
}
