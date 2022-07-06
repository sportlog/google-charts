<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\TimelineChart;

use Sportlog\GoogleCharts\Charts\Options\{BackgroundColor, BaseOptions};

/**
 * Options for TimelineChart
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/timeline#Configuration_Options
 */
class TimelineChartOptions extends BaseOptions
{
    public ?bool $avoidOverlappingGridLines = null;
    public ?BackgroundColor $backgroundColor = null;
    public ?array $colors = null;
    public ?bool $enableInteractivity = null;
    public ?string $fontName = null;
    public ?string $fontSize = null;
    public ?bool $forceIFrame = null;
    public ?TimelineOptions $timeline = null;
    public ?TimelineTooltip $tooltip = null;

}
