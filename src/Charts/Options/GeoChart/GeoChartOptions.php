<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GeoChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{Tooltip\ChartTooltip, ChartBackgroundColor, ChartColorAxis, ChartSizeable, ChartSizeAxis};

/**
 * GeoChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/geochart#configuration-options
 */
class GeoChartOptions extends ChartSizeable
{
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?ChartColorAxis $colorAxis = null;
    public ?string $datalessRegionColor = null;
    public ?string $defaultColor = null;
    public ?GeoChartDisplayMode $displayMode = null;
    public ?string $domain = null;
    public ?bool $enableRegionInteractivity = null;
    public ?bool $forceIFrame = null;
    public ?int $geochartVersion = null;
    public ?bool $keepAspectRatio = null;
    public ?GeoChartLegend $legend = null;
    public ?string $region = null;
    public ?GeoChartMagnifyingGlass $magnifyingGlass = null;
    public ?float $markerOpacity = null;
    public ?int $regioncoderVersion = null;
    public ?GeoChartResolution $resolution = null;
    public ?ChartSizeAxis $sizeAxis = null;
    public ?ChartTooltip $tooltip = null;
}
