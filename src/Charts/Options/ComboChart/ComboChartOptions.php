<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\ComboChart;

use Sportlog\GoogleCharts\Charts\Options\AreaChart\AreaChartAggregationTarget;
use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, ChartLegend\ChartLegend, Tooltip\ChartTooltip, ChartAnimation, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartCurveType, ChartFocusTarget, ChartOrientation, ChartPointShape, ChartSelectionMode, ChartSeriesOptions, ChartSeriesOptionsCollection, ChartSeriesType, ChartTextStyle};
use Sportlog\GoogleCharts\Charts\Options\CrossHair\ChartCrossHair;

/**
 * ColumnChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/combochart#configuration-options
 */
class ComboChartOptions extends ChartBaseOptions
{
    public ?AreaChartAggregationTarget $aggregationTarget = null;
    public ?ChartAnimation $animation = null;
    public ?float $areaOpacity = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartArea $area = null;
    public ?ChartCrossHair $crosshair = null;
    public ?ChartCurveType $curveType = null;
    public ?float $dataOpacity = null;
    public ?ChartFocusTarget $focusTarget = null;
    public ?ChartAxis $hAxis = null;
    public ?bool $interpolateNulls = null;
    public ?bool $isStacked = null;
    public ?ChartLegend $legend = null;
    public ?array $lineDashStyle = null;
    public ?int $lineWidth = null;
    public ?ChartOrientation $orientation = null;
    public ?ChartPointShape $pointShape = null;
    public ?int $pointSize = null;
    public ?bool $pointsVisible = null;
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
