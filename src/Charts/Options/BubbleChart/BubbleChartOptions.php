<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\BubbleChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, ChartLegend\ChartLegend, Tooltip\ChartTooltip, ChartAnimation, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartColorAxis, ChartExplorer, ChartSelectionMode, ChartSizeAxis, ChartTextStyle};

/**
 * BubbleChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/bubblechart#configuration-options
 */
class BubbleChartOptions extends ChartBaseOptions
{
    public ?ChartAnimation $animation = null;
    public ?ChartAxisTitlePosition $axisTitlesPosition = null;
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartBubble $bubble = null;
    public ?ChartArea $chartArea = null;
    public ?ChartColorAxis $colorAxis = null;
    public ?bool $enableInteractivity = null;
    public ?ChartExplorer $explorer = null;
    public ?ChartAxis $hAxis = null;
    public ?ChartLegend $legend = null;
    public ?ChartSelectionMode $selectionMode = null;
    // TODO: series
    public ?ChartSizeAxis $sizeAxis = null;
    public ?string $theme = null;
    public ?string $title = null;
    public ?ChartAxisTitlePosition $titlePosition = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?ChartTooltip $tooltip = null;
    public ?ChartAxis $vAxis = null;
}
