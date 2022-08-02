<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\HistogramChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, ChartLegend\ChartLegend, Tooltip\ChartTooltip, ChartAnimation, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartExplorer, ChartFocusTarget, ChartGroupWidth, ChartOrientation, ChartSeriesOptionsCollection, ChartTextStyle};

/**
 * Histogram options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/histogram#configuration-options
 */
class HistogramChartOptions extends ChartBaseOptions
{
    public ?ChartAnimation $animation = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartGroupWidth $bar = null;
    public ?ChartArea $chartArea = null;
    public ?float $dataOpacity = null;
    public ?ChartFocusTarget $focusTarget = null;
    public ?ChartAxis $hAxis = null;
    public ?HistogramOptions $histogram = null;
    public ?bool $interpolateNulls = null;
    public ?bool $isStacked = null;
    public ?ChartLegend $legend = null;
    public ?bool $reverseCategories = null;
    public ?ChartOrientation $orientation = null;
    public ?ChartSeriesOptionsCollection $series = null;
    public ?string $theme = null; // can only be 'maximized'
    public ?string $title = null;
    public ?ChartAxisTitlePosition $titlePosition = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?ChartTooltip $tooltip = null;
    public mixed $vAxes = null;
    public ?ChartAxis $vAxis = null;
}
