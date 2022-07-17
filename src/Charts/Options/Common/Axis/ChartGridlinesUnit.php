<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Axis;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartGridlinesUnit extends NotNullSerializer
{
    public function __construct(
        public ?ChartGridlinesFormat $years = null,
        public ?ChartGridlinesFormat $months = null,
        public ?ChartGridlinesFormat $days = null,
        public ?ChartGridlinesFormat $hours = null,
        public ?ChartGridlinesFormat $minutes = null,
        public ?ChartGridlinesFormat $seconds = null,
        public ?ChartGridlinesFormat $milliseconds = null
    ) {
    }
}
