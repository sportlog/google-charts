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
use Sportlog\GoogleCharts\Charts\Options\ComboChart\ComboChartOptions;

/**
 * Combo chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/combochart
 */
class ComboChart extends GoogleChart
{
    /**
     * Creates a new combo chart instance
     *
     * @param string $id
     * @param ComboChartOptions $options
     */
    public function __construct(
        string $id,
        public readonly ComboChartOptions $options = new ComboChartOptions()
    ) {
        parent::__construct($id, ChartType::Column, $options);
    }
}
