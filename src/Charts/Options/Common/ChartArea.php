<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

class ChartArea
{
    public function __construct(
        public readonly string|int|null $left = null,
        public readonly string|int|null $top = null,
        public readonly string|int|null $width = null,
        public readonly string|int|null $height = null,
    ) {
    }
}
