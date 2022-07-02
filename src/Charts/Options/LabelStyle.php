<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

use JsonSerializable;

class LabelStyle implements JsonSerializable {
    
    public function __construct(private readonly string $color, private readonly string $fontName, private readonly string $fontSize)
    {
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        return [
            'color' => $this->color,
            'fontName' => $this->fontName,
            'fontSize' => $this->fontSize
        ];
    }
}