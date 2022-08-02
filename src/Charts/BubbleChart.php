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
use Sportlog\GoogleCharts\Charts\Options\BubbleChart\BubbleChartOptions;

/**
 * Bubble chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/bubblechart
 */
class BubbleChart extends GoogleChart
{
    /**
     * Creates a new bubble chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param BubbleChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly BubbleChartOptions $options = new BubbleChartOptions()
    ) {
        parent::__construct($id, ChartType::Bubble, $data, $options);
    }
}
