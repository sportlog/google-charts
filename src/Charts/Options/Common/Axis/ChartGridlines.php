<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Axis;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartGridlines extends NotNullSerializer
{
    public function __construct(
        public readonly ?string $color = null,
        public readonly ?int $count = null,
        public readonly ?array $interval = null,
        public readonly ?float $minSpacing = null,
        public readonly ?int $multiple = null,
        public readonly ?ChartGridlinesUnit $units = null
    ) {
    }
}
