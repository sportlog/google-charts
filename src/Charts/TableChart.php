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
use Sportlog\GoogleCharts\Charts\Options\TableChart\TableChartOptions;

/**
 * Table chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/table
 */
class TableChart extends GoogleChart
{
    /**
     * Creates a new timeline chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param TableChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly TableChartOptions $options = new TableChartOptions()
    ) {
        parent::__construct($id, ChartType::Table, $data, $options);
    }
}
