<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

use ArrayObject;
use JsonSerializable;

class Slice implements JsonSerializable
{
    public function __construct(
        private readonly ?string $color = null,
        private readonly ?float $offset = null,
        private readonly ?string $textStyle = null
    ) {
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        $options = [];
        if (!empty($this->color)) {
            $options['color'] = $this->color;
        }
        if (!is_null($this->offset)) {
            $options['offset'] = $this->offset;
        }
        if (!is_null($this->textStyle)) {
            $options['textStyle'] = $this->textStyle;
        }

        return new ArrayObject($options);
    }
}
