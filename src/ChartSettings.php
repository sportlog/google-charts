<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartSettings extends NotNullSerializer
{
    public function __construct(public readonly ?string $mapsApiKey = null)
    {
    }
}
