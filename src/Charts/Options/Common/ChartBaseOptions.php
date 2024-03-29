<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

abstract class ChartBaseOptions extends ChartSizeable
{
    public ?array $colors = null;
    public ?bool $enableInteractivity = null;
    public ?string $fontName = null;
    public ?string $fontSize = null;
    public ?bool $forceIFrame = null;
}
