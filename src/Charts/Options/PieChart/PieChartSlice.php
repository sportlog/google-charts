<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class PieChartSlice extends NotNullSerializer
{
    public function __construct(
        public readonly ?string $color = null,
        public readonly ?float $offset = null,
        public readonly ?string $textStyle = null
    ) {
    }
}
