<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Base\{ChartType, GoogleChart};
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineChartOptions;

/**
 * Timeline chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/timeline
 */
class TimelineChart extends GoogleChart {
    /**
     * Creates a new timeline chart instance
     *
     * @param string $id
     * @param TimelineChartOptions $options
     */
    public function __construct(string $id, public readonly TimelineChartOptions $options = new TimelineChartOptions())
    {
        parent::__construct($id, ChartType::Timeline, $options);
    }
}