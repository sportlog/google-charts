<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartCrossHairColor extends NotNullSerializer
{
    public function __construct(
        public readonly ?string $color = null,
        public readonly ?float $opacity = null
    ) {
    }
}
