<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

class ChartBackgroundColor
{
    public function __construct(
        public readonly string $stroke,
        public readonly int $strokeWidth,
        public readonly string $fill
    ) {
    }
}
