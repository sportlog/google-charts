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

class MapDefinition extends NotNullSerializer
{
    /**
     * Ctor
     *
     * @param string $name
     * @param MapStyle[] $styles
     */
    public function __construct(public string $name, public array $styles)
    {
    }
}
