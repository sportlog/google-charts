<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Map;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class MapIcon extends NotNullSerializer
{
    public function __construct(public string $normal, public string $selectd)
    {
    }
}
