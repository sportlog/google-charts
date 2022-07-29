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

class ChartBackgroundColor extends NotNullSerializer
{
    public function __construct(
        public readonly ?string $stroke = null,
        public readonly ?int $strokeWidth = null,
        public readonly ?string $fill = null
    ) {
    }
}
