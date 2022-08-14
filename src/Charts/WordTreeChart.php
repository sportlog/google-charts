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
use Sportlog\GoogleCharts\Charts\Options\WordTreeChart\WordTreeChartOptions;

/**
 * WordTree chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/wordtree
 */
class WordTreeChart extends GoogleChart
{
    /**
     * Creates a new wordtree chart instance
     *
     * @param string $id
     * @param DataTable $data
     * @param WordTreeChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly WordTreeChartOptions $options = new WordTreeChartOptions()
    ) {
        parent::__construct($id, ChartType::WordTree, $data, $options);
    }
}
