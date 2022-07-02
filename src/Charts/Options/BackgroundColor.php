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

class BackgroundColor implements JsonSerializable {
    public function __construct(private readonly string $stroke, private readonly int $strokeWidth, private readonly string $fill)
    {
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        return [
            'stroke' => $this->stroke,
            'strokeWidth' => $this->strokeWidth,
            'fill' => $this->fill
        ];
    }
}