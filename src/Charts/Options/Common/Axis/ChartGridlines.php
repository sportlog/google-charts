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
        public ?string $color = null,
        public ?int $count = null,
        public ?array $interval = null,
        public ?float $minSpacing = null,
        public ?int $multiple = null,
        public ?ChartGridlinesUnit $units = null
    ) {
    }
}
