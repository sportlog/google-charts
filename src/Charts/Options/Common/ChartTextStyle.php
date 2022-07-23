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

/**
 * An object that specifies the legend text style.
 */
class ChartTextStyle extends NotNullSerializer
{
    public function __construct(
        public ?string $fontName = null,
        public ?int $fontSize = null,
        public ?bool $bold = null,
        public ?bool $italic = null,
        public ?string $color = null,
        public ?string $auraColor = null,
        public ?float $opacity = null
    ) {
    }
}
