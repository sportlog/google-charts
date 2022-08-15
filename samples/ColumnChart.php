<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\ChartDesign;
use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnRole;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartStacked;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTitle;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Genre-Chart, 100% stacked
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Genre'));
$data->addColumn(new Column(ColumnType::Number, 'Fantasy & Sci Fi'));
$data->addColumn(new Column(ColumnType::Number, 'Romance'));
$data->addColumn(new Column(ColumnType::Number, 'Mystery/Crime'));
$data->addColumn(new Column(ColumnType::Number, 'General'));
$data->addColumn(new Column(ColumnType::Number, 'Western'));
$data->addColumn(new Column(ColumnType::Number, 'Literature'));
$data->addColumn(new Column(ColumnType::String, role: ColumnRole::Annotation));
$data->addRows(
    ['2010', 10, 24, 20, 32, 18, 5, ''],
    ['2020', 16, 22, 23, 30, 16, 9, ''],
    ['2030', 28, 19, 29, 30, 12, 13, '']
);

$chart = $chartService->createColumnChart('genre', $data);
$chart->options->height = 300;
$chart->options->width = 411;
$chart->options->isStacked = ChartStacked::Percent;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::Top, maxLines: 3);
$chart->options->vAxis = new ChartAxis(minValue: 0, ticks: [0, .3, .6, .9, 1]);

// ********************************
// Sales-Chart using Material design
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Element'));
$data->addColumn(new Column(ColumnType::Number, 'Sales'));
$data->addColumn(new Column(ColumnType::Number, 'Expenses'));
$data->addColumn(new Column(ColumnType::Number, 'Profit'));
$data->addRows([
    ['2014', 1000, 400, 200],
    ['2015', 1170, 460, 250],
    ['2016', 660, 1120, 300],
    ['2017', 1030, 540, 350]
]);

$chart = $chartService->createColumnChart('element', $data, design: ChartDesign::Material);
$chart->options->height = 500;
$chart->options->width = 800;
$chart->options->chart = new ChartTitle('Company Performance', 'Sales, Expenses, and Profit: 2014-2017');

// Draw all charts
echo $chartService->render('genre');
echo $chartService->render('element');
