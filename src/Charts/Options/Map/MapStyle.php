<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Map;

use ArrayObject;
use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class MapStyle extends NotNullSerializer
{
    public array $stylers;

    public function __construct(array $stylers, public ?string $elementType = null, public ?string $featureType = null)
    {
        $this->stylers = [];
        foreach ($stylers as $key => $value) {
            $this->stylers[] = new ArrayObject([$key => $value]);
        }
    }
}
