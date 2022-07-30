<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GanttChart;

use DateTimeInterface;
use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;
use Sportlog\GoogleCharts\Charts\Options\Common\{ChartBackgroundColor, ChartFill, ChartLabelStyle};

/**
 * Gantt options.
 */
class GanttOptions extends NotNullSerializer
{
    public readonly ?int $defaultStartDate;

    public function __construct(
        public ?GanttArrow $arrow = null,
        public ?int $barCornerRadius = null,
        public ?int $barHeight = null,
        public ?bool $criticalPathEnabled = null,
        public ?ChartBackgroundColor $criticalPathStyle = null,
        DateTimeInterface|int|null $defaultStartDate = null,
        public ?ChartBackgroundColor $innerGridHorizLine = null,
        public ?ChartFill $innerGridTrack = null,
        public ?ChartFill $innerGridDarkTrack = null,
        public ?int $labelMaxWidth = null,
        public ?ChartLabelStyle $labelStyle = null,
        public ?bool $percentEnabled = null,
        public ?ChartFill $percentStyle = null,
        public ?bool $shadowEnabled = null,
        public ?string $shadowColor = null,
        public ?int $shadowOffset = null,
        public ?bool $sortTasks = null,
        public ?int $trackHeight = null
    ) {
        $this->defaultStartDate = $defaultStartDate instanceof DateTimeInterface ? $defaultStartDate->getTimestamp() : $defaultStartDate;
    }
}
