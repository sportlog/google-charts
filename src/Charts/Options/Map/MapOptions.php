<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Map;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * Map options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/map#configuration-options
 */
class MapOptions extends NotNullSerializer
{
    public ?bool $enableScrollWheel = null;
    public ?MapIconCollection $icons = null;
    public ?string $lineColor = null;
    public ?int $lineWidth = null;
    public ?MapDefinitionCollection $maps = null;
    public MapType|string|null $mapType = null;
    /**
     * If using the map type control (useMapTypeControl: true), the IDs specified in this array 
     * will be the only map types displayed in the map type control
     *
     * @var string[]
     */
    public ?array $mapTypeIds = null;
    public ?bool $showInfoWindow = null;
    public ?bool $showLine = null;
    public ?bool $showTooltip = null;
    public ?bool $useMapTypeControl = null;
    public ?int $zoomLevel = null;
}