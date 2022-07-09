<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

class ChartGradient
{
    public function __construct(
        public readonly string $color1,
        public readonly string $color2,
        public readonly string $x1,
        public readonly string $x2,
        public readonly string $y1,
        public readonly string $y2,
        public readonly ?bool $useObjectBoundingBoxUnits
    ) {
    }
}
