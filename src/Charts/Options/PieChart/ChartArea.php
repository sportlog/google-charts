<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\PieChart;

use JsonSerializable;
use Sportlog\GoogleCharts\Charts\Options\BackgroundColor;

class ChartArea implements JsonSerializable
{
    public function __construct(
        private readonly ?BackgroundColor $backgroundColor = null,
        private readonly string|int|null $left = null,
        private readonly string|int|null $top = null,
        private readonly string|int|null $width = null,
        private readonly string|int|null $height = null,
        private readonly ?array $colors = null,
    ) {
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        if (!is_null($this->backgroundColor)) {
            $options['backgroundColor'] = $this->backgroundColor;
        }
        if (!is_null($this->left)) {
            $options['left'] = $this->left;
        }
        if (!is_null($this->top)) {
            $options['top'] = $this->top;
        }
        if (!is_null($this->width)) {
            $options['width'] = $this->width;
        }
        if (!is_null($this->height)) {
            $options['height'] = $this->height;
        }
        if (!is_null($this->colors)) {
            $options['colors'] = $this->colors;
        }

        return $options;
    }
}
