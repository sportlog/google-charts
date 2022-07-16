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
        public readonly bool $isHtml,
        public readonly ChartTrigger $trigger,
        public readonly ?ChartTextStyle $textStyle = null
    ) {
    }
}
