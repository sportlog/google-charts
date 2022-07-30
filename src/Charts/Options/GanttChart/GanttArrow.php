<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GanttChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * GanttArrow.
 */
class GanttArrow extends NotNullSerializer
{
    public function __construct(
        public readonly ?int $angle = null,
        public readonly ?string $color = null,
        public readonly ?int $length = null,
        public readonly ?int $radius = null,
        public readonly ?int $spaceAfter = null,
        public readonly ?float $width = null
    ) {
    }
}
