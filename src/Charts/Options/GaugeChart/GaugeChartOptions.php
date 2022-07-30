<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GaugeChart;

use Sportlog\GoogleCharts\Charts\Options\Common\{ChartAnimation, ChartSizeable};

/**
 * GaugeChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/gaugechart#Configuration_Options
 */
class GaugeChartOptions extends ChartSizeable {
    public ?ChartAnimation $animation = null;
    public ?bool $forceIFrame = null;
    public ?string $greenColor = null;
    public ?int $greenFrom = null;
    public ?int $greenTo = null;
    public ?array $majorTicks = null;
    public ?int $max = null;
    public ?int $min = null;
    public ?int $minorTicks = null;
    public ?string $redColor = null;
    public ?int $redFrom = null;
    public ?int $redTo = null;
    public ?string $yellowColor = null;
    public ?int $yellowFrom = null;
    public ?int $yellowTo = null;
}