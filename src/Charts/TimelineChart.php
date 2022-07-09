<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineChartOptions;
use Sportlog\GoogleCharts\{ChartType, GoogleChart};

class TimelineChart extends GoogleChart {
    public function __construct(string $id, public readonly TimelineChartOptions $options = new TimelineChartOptions())
    {
        parent::__construct($id, ChartType::Timeline, $options);
    }
}