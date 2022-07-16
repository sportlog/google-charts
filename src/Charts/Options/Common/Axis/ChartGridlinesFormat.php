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

class ChartGridlinesFormat extends NotNullSerializer
{
    public function __construct(public readonly ?string $format = null)
    {
    }
}
