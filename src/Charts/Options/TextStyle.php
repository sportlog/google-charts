<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

/**
 * An object that specifies the legend text style.
 */
class TextStyle
{
    public function __construct(
        public ?string $fontName,
        public ?int $fontSize,
        public ?bool $bold,
        public ?bool $italic,
        public ?string $color,
        public ?string $auraColor,
        public int|float|null $opacity
    ) {
    }
}
