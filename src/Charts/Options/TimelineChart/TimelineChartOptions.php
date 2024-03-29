<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\TimelineChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{ChartBackgroundColor, ChartBaseOptions};

/**
 * TimelineChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/timeline#Configuration_Options
 */
class TimelineChartOptions extends ChartBaseOptions
{
    public ?bool $avoidOverlappingGridLines = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?TimelineOptions $timeline = null;
    public ?TimelineTooltip $tooltip = null;

}
