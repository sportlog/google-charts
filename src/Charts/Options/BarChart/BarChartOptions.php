<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\BarChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, ChartLegend\ChartLegend, Tooltip\ChartTooltip, Trendline\ChartTrendlineCollection, ChartAnimation, ChartAnnotations, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartExplorer, ChartFocusTarget, ChartOrientation, ChartSeriesOptions, ChartStacked, ChartTextStyle, ChartTitle};

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
    public ?ChartTitle $chart = null;
    public ?float $dataOpacity = null;
    public ?ChartExplorer $explorer = null;
    public ?ChartFocusTarget $focusTarget = null;
    public mixed $hAyes = null;
    public ?ChartAxis $hAxis = null;
    public ChartStacked|bool|null $isStacked = null;
    public ?ChartLegend $legend = null;
    public ?bool $reverseCategories = null;
    public ?ChartOrientation $orientation = null;
     /**
     * An array of objects, each describing the format of the corresponding series in the chart.
     *
     * @var ChartSeriesOptions[]|null
     */
    public ?array $series = null;
    public ?string $theme = null; // can only be 'maximized'
    public ?string $title = null;
    public ?ChartAxisTitlePosition $titlePosition = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?ChartTooltip $tooltip = null;
    public ?ChartTrendlineCollection $trendlines = null;
    public ?ChartAxis $vAxis = null;
}
