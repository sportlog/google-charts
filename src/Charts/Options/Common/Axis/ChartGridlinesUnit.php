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
        public readonly ?ChartGridlinesFormat $years = null,
        public readonly ?ChartGridlinesFormat $months = null,
        public readonly ?ChartGridlinesFormat $days = null,
        public readonly ?ChartGridlinesFormat $hours = null,
        public readonly ?ChartGridlinesFormat $minutes = null,
        public readonly ?ChartGridlinesFormat $seconds = null,
        public readonly ?ChartGridlinesFormat $milliseconds = null
    ) {
    }
}
