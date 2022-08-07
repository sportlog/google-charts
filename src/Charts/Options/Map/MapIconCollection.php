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
use JsonSerializable;

class MapIconCollection implements JsonSerializable
{
    private array $items = [];

    /**
     * Adds an icon with the given index.
     *
     * @param MapIcon $item
     * @param string $index
     * @return void
     */
    public function add(MapIcon $item, string $index): void
    {
        $this->items[$index] = $item;
    }

    /**
     * Must be encoded with the index as property name.
     * 
     * @example 
     * {
     *  default: {
     *      normal:   '/path/to/marker/image',
     *      selected: '/path/to/marker/image'
     *  },
     *  customMarker: {
     *      normal:   '/path/to/other/marker/image',
     *      selected: '/path/to/other/marker/image'
     *  }
     * }
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return new ArrayObject($this->items);
    }
}
