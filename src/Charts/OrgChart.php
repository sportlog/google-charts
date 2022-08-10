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
use Sportlog\GoogleCharts\Charts\Options\OrgChart\OrgChartOptions;

/**
 * Org chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/orgchart
 */
class OrgChart extends GoogleChart
{
    /**
     * Creates a new org chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param OrgChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly OrgChartOptions $options = new OrgChartOptions()
    ) {
        parent::__construct($id, ChartType::Org, $data, $options);
    }
}
