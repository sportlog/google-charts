<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\SteppedAreaChart;

use Sportlog\GoogleCharts\Charts\Options\AreaChart\AreaChartAggregationTarget;
use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, Axis\ChartAxisCollection, ChartLegend\ChartLegend, Tooltip\ChartTooltip, ChartAnimation, ChartAnnotations, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartExplorer, ChartFocusTarget, ChartSelectionMode, ChartSeriesOptionsCollection, ChartStacked, ChartTextStyle};

/**
 * SteppedAreaChart ptions.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/steppedareachart#configuration-options
 */
class SteppedAreaChartOptions extends ChartBaseOptions {
    public ?AreaChartAggregationTarget $aggregationTarget = null;
    public ?ChartAnimation $animation = null;
    public ?float $areaOpacity = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartArea $chartArea = null;
    public ?bool $connectSteps = null;
    public ?ChartExplorer $explorer = null;
    public ?ChartFocusTarget $focusTarget = null;
    public ?ChartAxis $hAxis = null;
    public ChartStacked|bool|null $isStacked = null;
    public ?ChartLegend $legend = null;
    /**
     * The on-and-off pattern for dashed lines.
     *
     * @var int[]|null
     */
    public ?array $lineDashStyle = null;
    public ?bool $reverseCategories = null;
    public ?ChartSelectionMode $selectionMode = null;
    public ?ChartSeriesOptionsCollection $series = null;
    public ?string $theme = null; // can only be 'maximized'
    public ?string $title = null;
    public ?ChartAxisTitlePosition $titlePosition = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?ChartTooltip $tooltip = null;
    public ?ChartAxisCollection $vAxes = null;
    public ?ChartAxis $vAxis = null;
}