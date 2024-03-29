<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\AreaChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, ChartLegend\ChartLegend, Tooltip\ChartTooltip, ChartAnimation, ChartAnnotations, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartExplorer, ChartFocusTarget, ChartOrientation, ChartPointShape, ChartSelectionMode, ChartSeriesOptions, ChartSeriesOptionsCollection, ChartStacked, ChartTextStyle};

/**
 * AreaChart ptions.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/areachart#configuration-options
 */
class AreaChartOptions extends ChartBaseOptions {
    public ?AreaChartAggregationTarget $aggregationTarget = null;
    public ?ChartAnimation $animation = null;
    public ?ChartAnnotations $annotations = null;
    public ?float $areaOpacity = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartArea $chartArea = null;
    // public ?array $colors = null;
    // public ?bool $enableInteractivity = null;
    public ?ChartExplorer $explorer = null;
    public ?ChartFocusTarget $focusTarget = null;
    public ?ChartAxis $hAxis = null;
    public ?bool $interpolateNulls = null;
    public ChartStacked|bool|null $isStacked = null;
    public ?ChartLegend $legend = null;
    /**
     * The on-and-off pattern for dashed lines.
     *
     * @var int[]|null
     */
    public ?array $lineDashStyle = null;
    public ?float $lineWidth = null;
    public ?ChartOrientation $orientation = null;
    public ?ChartPointShape $pointShape = null;
    public ?float $pointSize = null;
    public ?bool $pointsVisible = null;
    public ?bool $reverseCategories = null;
    public ?ChartSelectionMode $selectionMode = null;
    public ?ChartSeriesOptionsCollection $series = null;
    public ?string $theme = null; // can only be 'maximized'
    public ?string $title = null;
    public ?ChartAxisTitlePosition $titlePosition = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?ChartTooltip $tooltip = null;
    public ?ChartAxis $vAxis = null;
}