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
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;

class ChartColorAxis extends NotNullSerializer
{
    public function __construct(
        public ?int $minValue = null,
        public ?int $maxValue = null,
        public ?array $values = null,
        public ?array $colors = null,
        public ?ChartLegend $legend = null
    ) {
    }
}
