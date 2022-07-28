<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\CandlestickChart;

use Sportlog\GoogleCharts\Charts\Options\AreaChart\AreaChartAggregationTarget;
use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, ChartLegend\ChartLegend, Tooltip\ChartTooltip, ChartAnimation, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartCandleStick, ChartFocusTarget, ChartGroupWidth, ChartOrientation, ChartSelectionMode, ChartSeriesOptionsCollection, ChartSeriesType, ChartTextStyle};

/**
 * CandlestickChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/candlestickchart#configuration-options
 */
class CandlestickChartOptions extends ChartBaseOptions
{
    public ?AreaChartAggregationTarget $aggregationTarget = null;
    public ?ChartAnimation $animation = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartGroupWidth $bar = null;
    public ?ChartCandleStick $candlestick = null;
    public ?ChartArea $chartArea = null;
    public ?ChartFocusTarget $focusTarget = null;
    public ?ChartAxis $hAxis = null;
    public ?ChartLegend $legend = null;
    public ?ChartOrientation $orientation = null;
    public ?bool $reverseCategories = null;
    public ?ChartSelectionMode $selectionMode = null;
    public ?ChartSeriesOptionsCollection $series = null;
    public ?ChartSeriesType $seriesType = null;
    public ?string $theme = null; // can only be 'maximized'
    public ?string $title = null;
    public ?ChartAxisTitlePosition $titlePosition = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?ChartTooltip $tooltip = null;
    public mixed $vAxes = null; 
    public ?ChartAxis $vAxis = null; 
}
