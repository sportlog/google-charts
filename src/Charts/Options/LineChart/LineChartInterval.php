<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\LineChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * LineChart interval.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/intervals#combining-interval-styles
 */
class LineChartInterval extends NotNullSerializer
{
    public function __construct(
        public ?LineChartIntervalStyle $style = null,
        public ?string $color = null,
        public ?int $barWidth = null,
        public ?int $boxWidth = null,
        public ?float $lineWidth = null,
        public ?int $pointSize = null,
        public ?int $fillOpacity = null
    ) {
    }
}
