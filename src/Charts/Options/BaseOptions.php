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

abstract class BaseOptions
{
    private array $options = [];

    public function setHeight(?int $value): void
    {
        $this->setOption('height', $value);
    }

    public function setWidth(?int $value): void
    {
        $this->setOption('width', $value);
    }

    protected function setOption(string $key, mixed $value): void
    {
        if (is_null($value) || (is_array($value) && count($value) === 0)) {
            unset($this->options[$key]);
        } else {
            $this->options[$key] = $value;
        }
    }
}
