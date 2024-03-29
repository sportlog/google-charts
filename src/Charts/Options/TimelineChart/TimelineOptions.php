<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\TimelineChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLabelStyle;

class TimelineOptions extends NotNullSerializer
{
    public function __construct(
        public ?bool $colorByRowLabel = null,
        public ?bool $groupByRowLabel = null,
        public ?ChartLabelStyle $rowLabelStyle = null,
        public ?bool $showBarLabels = null,
        public ?bool $showRowLabels = null,
        public ?string $singleColor  = null
    ) {
    }
}
