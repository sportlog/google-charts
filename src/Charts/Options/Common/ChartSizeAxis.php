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

class ChartSizeAxis extends NotNullSerializer
{
    public function __construct(
        public ?int $maxSize = null,
        public ?int $maxValue = null,
        public ?int $minSize = null,
        public ?int $minValue = null
    ) {
    }
}
