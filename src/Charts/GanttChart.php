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
use Sportlog\GoogleCharts\Charts\Options\GanttChart\GanttChartOptions;

/**
 * Gantt chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/ganttchart
 */
class GanttChart extends GoogleChart
{
    /**
     * Creates a new Gantt chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param GanttChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly GanttChartOptions $options = new GanttChartOptions()
    ) {
        parent::__construct($id, ChartType::Gantt, $data, $options);
    }
}
