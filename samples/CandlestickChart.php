<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartBackgroundColor;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartCandleStick;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartGroupWidth;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Week-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String));
$data->addColumn(new Column(ColumnType::Number));
$data->addColumn(new Column(ColumnType::Number));
$data->addColumn(new Column(ColumnType::Number));
$data->addColumn(new Column(ColumnType::Number));
$data->addRows([
    ['Mon', 20, 28, 38, 45],
    ['Tue', 31, 38, 55, 66],
    ['Wed', 50, 55, 77, 80],
    ['Thu', 77, 77, 66, 50],
    ['Fri', 68, 66, 22, 15]
]);

$chart = $chartService->createCandlestickChart('week', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);

// ********************************
// Week-Color Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String));
$data->addColumn(new Column(ColumnType::Number));
$data->addColumn(new Column(ColumnType::Number));
$data->addColumn(new Column(ColumnType::Number));
$data->addColumn(new Column(ColumnType::Number));
$data->addRows([
    ['Mon', 20, 28, 38, 45],
    ['Tue', 31, 38, 55, 66],
    ['Wed', 50, 55, 77, 80],
    ['Thu', 77, 77, 66, 50],
    ['Fri', 68, 66, 22, 15]
]);

$chart = $chartService->createCandlestickChart('week-color', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$chart->options->bar = new ChartGroupWidth('100%');
$chart->options->candlestick = new ChartCandleStick(
    fallingColor: new ChartBackgroundColor(strokeWidth: 0, fill: '#a52714'),
    risingColor: new ChartBackgroundColor(strokeWidth: 0, fill: '#0f9d58'),
);

// Draw all charts
echo $chartService->render('week');
echo $chartService->render('week-color');
