<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartColorAxis;
use Sportlog\GoogleCharts\Charts\Options\GeoChart\GeoChartDisplayMode;
use Sportlog\GoogleCharts\ChartService;
use Sportlog\GoogleCharts\ChartSettings;

// Attention: In order to user markers (second chart), you must specify an mapsApiKey.
// This one is taken from https://developers.google.com/chart/interactive/docs/gallery/geochart
// and won't work.
$chartService = new ChartService(new ChartSettings('AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'));

// ********************************
// Popularity-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Country'));
$data->addColumn(new Column(ColumnType::Number, 'Popularity'));

$data->addRows(
    ['Germany', 200],
    ['United States', 300],
    ['Brazil', 400],
    ['Canada', 500],
    ['France', 600],
    ['RU', 700]
);

$chart = $chartService->createGeoChart('popularity', $data);
$chart->options->width = 900;
$chart->options->height = 500;

// ********************************
// Popularity-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Country'));
$data->addColumn(new Column(ColumnType::Number, 'Population'));
$data->addColumn(new Column(ColumnType::Number, 'Area'));

$data->addRows(
    ['Rome',      2761477,    1285.31],
    ['Milan',     1324110,    181.76],
    ['Naples',    959574,     117.27],
    ['Turin',     907563,     130.17],
    ['Palermo',   655875,     158.9],
    ['Genoa',     607906,     243.60],
    ['Bologna',   380181,     140.7],
    ['Florence',  371282,     102.41],
    ['Fiumicino', 67370,      213.44],
    ['Anzio',     52192,      43.43],
    ['Ciampino',  38262,      11]
);

$chart = $chartService->createGeoChart('population', $data);
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->region = 'IT';
$chart->options->displayMode = GeoChartDisplayMode::Markers;
$chart->options->colorAxis = new ChartColorAxis(colors: ['green', 'blue']);

// Draw all charts
echo $chartService->render('popularity');
echo $chartService->render('population');
