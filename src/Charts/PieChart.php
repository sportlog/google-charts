<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartOptions;
use Sportlog\GoogleCharts\{ChartType, GoogleChart};

class PieChart extends GoogleChart {
    public function __construct(string $id, public readonly PieChartOptions $options = new PieChartOptions())
    {
        parent::__construct($id, ChartType::Pie, $options);
    }
}