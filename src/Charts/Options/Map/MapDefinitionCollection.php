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

class MapDefinitionCollection implements JsonSerializable
{
    private array $items = [];

    /**
     * Adds a style with the given index.
     *
     * @param MapDefinition $item
     * @param string $index
     * @return void
     */
    public function add(MapDefinition $item, string $index): void
    {
        $this->items[$index] = $item;
    }

    /**
     * Must be encoded with the index as property name.
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return new ArrayObject($this->items);
    }
}
