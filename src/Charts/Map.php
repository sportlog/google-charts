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
use Sportlog\GoogleCharts\Charts\Options\Map\MapOptions;

/**
 * Map
 */
class Map extends GoogleChart
{
    /**
     * Creates a new map
     *
     * @param string $id
     * @param DataTable $data
     * @param BarChartOptions $options
     */
    public function __construct(
        string $id,
        DataTable $data,
        public readonly MapOptions $options = new MapOptions()
    ) {
        parent::__construct($id, ChartType::Map, $data, $options);
    }
}
