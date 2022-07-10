<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\AreaChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{ChartLegend\ChartLegend, ChartAnimation, ChartAnnotations, ChartArea, ChartAxisTitlePosition, ChartBackgroundColor, ChartBaseOptions, ChartExplorer, ChartFocusTarget};

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
    public ?ChartArea $area = null;
    /**
     * Colors
     *
     * @var string[]|null
     */
    // public ?array $colors = null;
    // public ?bool $enableInteractivity = null;
    public ?ChartExplorer $explorer = null;
    public ?ChartFocusTarget $focusTarget = null;
    // TODO: hAxis
    public AreaChartStacked|bool|null $isStacked = null;
    public ?ChartLegend $legend = null;
    
}