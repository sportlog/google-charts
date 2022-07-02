<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

/**
 * Options for PieChart
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/piechart#configuration-options
 */
class PieChartOptions extends BaseOptions
{
    public function setBackgroundColor(string|BackgroundColor|null $value): void
    {
        $this->setOption('backgroundColor', $value);
    }

    public function setChartArea(?ChartArea $value): void
    {
        $this->setOption('chartArea', $value);
    }

    /**
     * Undocumented function
     *
     * @param Slices[]|null $value
     * @return void
     */
    public function setSlices(?array $value): void
    {
        $this->setOption('slices', $value);
    }
}
