<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\BarChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{ChartAnimation, ChartAnnotations, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartOrientation};

/**
 * BarChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/barchart#configuration-options
 */
class BarChartOptions extends ChartBaseOptions
{
    public ?ChartAnimation $animation = null;
    public ?ChartAnnotations $annotations = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?BarChartGroupWidth $bar = null;
    public ?ChartOrientation $bars = null;
    public ?ChartArea $chartArea = null;
}
