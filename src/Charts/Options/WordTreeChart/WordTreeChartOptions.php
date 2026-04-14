<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\WordTreeChart;

use Sportlog\GoogleCharts\Charts\Options\Common\ChartSizeable;

/**
 * WordTreeChart options.
 * 
 * @link https://developers.google.com/chart/interactive/docs/gallery/wordtree#Configuration_Options
 */
class WordTreeChartOptions extends ChartSizeable
{
    /**
     * The colors to use for the chart.
     * @var string[]|null
     */
    public ?array $colors = null;
    public ?bool $forceIFrame = null;
    public ?string $fontName = null;
    public ?int $maxFontSize = null;
    public ?WordTreeOptions $wordtree = null;
}
