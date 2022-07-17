<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Tooltip;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;

class ChartTooltip extends NotNullSerializer
{
    public function __construct(
        public bool $isHtml,
        public ChartTrigger $trigger,
        public ?ChartTextStyle $textStyle = null,
        public ?bool $showColorCode = null,
        public ?bool $ignoreBounds = null
    ) {
    }
}
