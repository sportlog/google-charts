<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartBoxStyle extends NotNullSerializer
{
    public function __construct(
        public readonly string $stroke,
        public readonly int $strokeWidth,
        public readonly int $rx,
        public readonly int $ry,
        public readonly ?ChartGradient $gradient
    ) {
    }
}
