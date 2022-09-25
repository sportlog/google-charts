<?php

use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Map\MapOptions;
use Sportlog\GoogleCharts\{ChartService, ChartSettings};

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

echo 'You need to set the API-Key, otherwise Map will not display properly!';

$apiKey = 'YourAPIKey';

$chartService = new ChartService(new ChartSettings($apiKey));
$data = DataTable::fromArray(
    [
        ['Country', 'Population'],
        ['China', 'China: 1,363,800,000'],
        ['India', 'India: 1,242,620,000'],
        ['US', 'US: 317,842,000'],
        ['Indonesia', 'Indonesia: 247,424,598'],
        ['Brazil', 'Brazil: 201,032,714'],
        ['Pakistan', 'Pakistan: 186,134,000'],
        ['Nigeria', 'Nigeria: 173,615,000'],
        ['Bangladesh', 'Bangladesh: 152,518,015'],
        ['Russia', 'Russia: 146,019,512'],
        ['Japan', 'Japan: 127,120,000']
    ]
);

$options = new MapOptions();
$options->showTooltip = true;
$options->showInfoWindow = true;
$map = $chartService->createMap('countries', $data, $options);

echo $chartService->render();