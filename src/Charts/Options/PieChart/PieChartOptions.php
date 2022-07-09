<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use Sportlog\GoogleCharts\Charts\Options\{ChartBackgroundColor, ChartBaseOptions, ChartLegend, ChartTextStyle};

/**
 * PieChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/piechart#configuration-options
 */
class PieChartOptions extends ChartBaseOptions
{
    public ?ChartBackgroundColor $backgroundColor = null;
    public ?PieChartArea $chartArea = null;
    // public ?array $colors = null;
    // public ?bool $enableInteractivity = null;
    // public ?string $fontName = null;
    // public ?string $fontSize = null;
    // public ?bool $forceIFrame = null;
    public ?bool $is3D = null;
    public ?ChartLegend $legend = null;
    public int|float|null $pieHole = null;
    public ?string $pieSliceBorderColor = null;
    public ?PieChartSliceText $pieSliceText = null;
    public ?ChartTextStyle $pieSliceTextStyle = null;
    public int|float|null $pieStartAngle = null;
    public ?bool $reverseCategories = null;
    public ?string $pieResidueSliceColor = null;
    public ?string $pieResidueSliceLabel = null;
    /**
     * An array of objects, each describing the format of the corresponding slice in the pie.
     *
     * @var PieSlice[]|null
     */
    public ?array $slices = null;
    public ?float $sliceVisibilityThreshold = null;
    public ?string $title = null;
    public ?ChartTextStyle $titleTextStyle = null;
    public ?PieChartTooltip $tooltip = null;
}
