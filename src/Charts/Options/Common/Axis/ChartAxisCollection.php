<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Axis;

use ArrayObject;
use JsonSerializable;

class ChartAxisCollection implements JsonSerializable
{
    private array $items = [];

    /**
     * Adds an axis with the given index.
     *
     * @param ChartAxis $item
     * @param int $index
     * @return void
     */
    public function add(ChartAxis $item, int $index): void
    {
        $this->items[$index] = $item;
    }

    /**
     * Must be encoded with the index as property name.
     * 
     * @example 
     * {
     *  1: {
     *      title:   'some title'
     *  },
     *  2: {
     *      title: 'other title',
     *      maxValue: 500
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
