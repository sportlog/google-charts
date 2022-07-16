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

class TimelineTooltip extends NotNullSerializer
{
    public function __construct(public readonly bool $isHtml, public readonly TimelineTrigger $trigger)
    {
    }
}
