<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

class ChartAnimation
{
    public function __construct(
        public readonly int $duration,
        public readonly ?ChartAnimationEase $easing,
        public readonly ?bool $startup = false
    ) {
    }
}
