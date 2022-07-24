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

class ChartCandleStick extends NotNullSerializer
{
    public function __construct(
        public ?bool $hollowIsRising = null,
        public ?ChartBackgroundColor $fallingColor = null,
        public ?ChartBackgroundColor $risingColor = null
    ) {
    }
}
