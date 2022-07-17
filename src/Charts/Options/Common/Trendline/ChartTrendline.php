<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Trendline;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartTrendline extends NotNullSerializer
{
    public function __construct(
        public ?string $color = null,
        public ?int $degree = null,
        public ?string $labelInLegend = null,
        public ?int $lineWidth = null,
        public ?float $opacity = null,
        public ?int $pointSize = null,
        public ?bool $pointsVisible = null,
        public ?bool $showR2 = null,
        public ?ChartTrendline $type = null,
        public ?bool $visibleInLegend = null
    ) {
    }
}
