<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

class ChartExplorer
{
    /**
     * Ctor
     *
     * @param string[]|null $actions
     * @param string|null $axis
     * @param boolean|null $keepInBounds
     * @param float|null $maxZoomIn
     * @param float|null $maxZoomOut
     * @param float|null $zoomDelta
     */
    public function __construct(
        public ?array $actions,
        public ?string $axis,
        public ?bool $keepInBounds,
        public ?float $maxZoomIn,
        public ?float $maxZoomOut,
        public ?float $zoomDelta
    ) {
    }
}
