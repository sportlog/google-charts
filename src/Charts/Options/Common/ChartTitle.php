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

class ChartTitle extends NotNullSerializer
{
    public function __construct(
        public ?string $title,
        public ?string $subtitle
    ) {
    }
}
