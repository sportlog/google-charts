<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\ChartDesign;
use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartCurveType;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTitle;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Population-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Year'));
$data->addColumn(new Column(ColumnType::Number, 'Sales'));
$data->addColumn(new Column(ColumnType::Number, 'Expenses'));
$data->addRows(
    ['2004',  1000,      400],
    ['2005',  1170,      460],
    ['2006',  660,       1120],
    ['2007',  1030,      540]
);

$chart = $chartService->createLineChart('performance', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->title = 'Company Performance';
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::Bottom);
$chart->options->curveType = ChartCurveType::Function;

// ********************************
// Box Office Earnings-Chart (Material Design)
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::Number, 'Day'));
$data->addColumn(new Column(ColumnType::Number, 'Guardians of the Galaxy'));
$data->addColumn(new Column(ColumnType::Number, 'The Avengers'));
$data->addColumn(new Column(ColumnType::Number, 'Transformers: Age of Extinction'));
$data->addRows(
    [1,  37.8, 80.8, 41.8],
    [2,  30.9, 69.5, 32.4],
    [3,  25.4,   57, 25.7],
    [4,  11.7, 18.8, 10.5],
    [5,  11.9, 17.6, 10.4],
    [6,   8.8, 13.6,  7.7],
    [7,   7.6, 12.3,  9.6],
    [8,  12.3, 29.2, 10.6],
    [9,  16.9, 42.9, 14.8],
    [10, 12.8, 30.9, 11.6],
    [11,  5.3,  7.9,  4.7],
    [12,  6.6,  8.4,  5.2],
    [13,  4.8,  6.3,  3.6],
    [14,  4.2,  6.2,  3.4]
);

$chart = $chartService->createLineChart('earnings', $data, design: ChartDesign::Material);
$chart->options->chart = new ChartTitle('Box Office Earnings in First Two Weeks of Opening', 'in millions of dollars (USD)');
$chart->options->height = 500;
$chart->options->width = 900;

// Draw all charts
echo $chartService->render('performance');
echo $chartService->render('earnings');
