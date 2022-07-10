<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

class ChartStemAndStyle
{
    public function __construct(public readonly string $style, public readonly ChartStem $stem)
    {
    }
}
