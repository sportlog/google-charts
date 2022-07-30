<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GanttChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{ChartBackgroundColor, ChartBaseOptions, ChartSizeable};

/**
 * GanttChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/ganttchart#Configuration_Options
 */
class GanttChartOptions extends ChartSizeable
{
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?GanttOptions $gantt = null;
}
