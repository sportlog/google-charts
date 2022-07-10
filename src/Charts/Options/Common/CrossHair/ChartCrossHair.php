<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

class ChartCrossHair
{
    public function __construct(
        public readonly ?ChartCrossHairTrigger $trigger = null,
        public readonly ?ChartCrossHairOrientation $orientation = null,
        public readonly ?string $color = null,
        public readonly ?float $opacity = null,
        public readonly ?ChartCrossHairColor $focused = null,
        public readonly ?ChartCrossHairColor $selected = null
    ) {
    }
}
