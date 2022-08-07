<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Test\LineChart;

use PHPUnit\Framework\TestCase;
use Sportlog\GoogleCharts\Charts\Options\Map\{MapDefinition, MapDefinitionCollection, MapOptions, MapStyle};

final class MapOptionsTest extends TestCase
{
    public function testSerialization(): void
    {
        $options = new MapOptions();
        $options->mapType = 'styledMap';
        $options->zoomLevel = 7;
        $options->showTooltip = true;
        $options->showInfoWindow = true;
        $options->useMapTypeControl = true;
        $options->mapTypeIds = ['styledMap', 'redEverything', 'imBlue'];
        
        $mapDef = new MapDefinitionCollection();
        $mapDef->add(new MapDefinition(
            'Styled Map',
            [
                new MapStyle(
                    [
                        'color' => '#fce8b2'
                    ],
                    featureType: 'poi.attraction'
                ),
                new MapStyle(
                    [
                        'hue' => '#0277bd',
                        'saturation' => -50
                    ],
                    featureType: 'road.highway'
                ),
                new MapStyle(
                    [
                        'hue' => '#000',
                        'saturation' => 100,
                        'lightness' => 50
                    ],
                    'labels.icon',
                    'road.highway'
                ),
                new MapStyle(
                    [
                        'hue' => '#259b24',
                        'saturation' => 10,
                        'lightness' => -22
                    ],
                    featureType: 'landscape'
                )
            ]
        ), 'styledMap');

        $options->maps = $mapDef;

        $expectedJson = <<<EOL
        {
            "maps": {
                "styledMap": {
                    "name": "Styled Map",
                    "styles": [
                        {
                            "stylers": {
                                "color": "#fce8b2"
                            },
                            "featureType": "poi.attraction"
                        },
                        {
                            "stylers": {
                                "hue": "#0277bd",
                                "saturation": -50
                            },
                            "featureType": "road.highway"
                        },
                        {
                            "stylers": {
                                "hue": "#000",
                                "saturation": 100,
                                "lightness": 50
                            },
                            "elementType": "labels.icon",
                            "featureType": "road.highway"
                        },
                        {
                            "stylers": {
                                "hue": "#259b24",
                                "saturation": 10,
                                "lightness": -22
                            },
                            "featureType": "landscape"
                        }
                    ]
                }
            },
            "mapType": "styledMap",
            "mapTypeIds": [
                "styledMap",
                "redEverything",
                "imBlue"
            ],
            "showInfoWindow": true,
            "showTooltip": true,
            "useMapTypeControl": true,
            "zoomLevel": 7
        }
        EOL;
        
        $json = json_encode($options, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }
}
