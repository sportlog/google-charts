<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\ChartDesign;
use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartGroupWidth;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartOrientation;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartStacked;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTitle;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Genre-Chart, 100% stacked
// ********************************
$chart = $chartService->createColumnChart('genre');
$chart->addColumn(new Column(ColumnType::String, 'Genre'));
$chart->addColumn(new Column(ColumnType::Number, 'Fantasy & Sci Fi'));
$chart->addColumn(new Column(ColumnType::Number, 'Romance'));
$chart->addColumn(new Column(ColumnType::Number, 'Mystery/Crime'));
$chart->addColumn(new Column(ColumnType::Number, 'General'));
$chart->addColumn(new Column(ColumnType::Number, 'Western'));
$chart->addColumn(new Column(ColumnType::Number, 'Literature'));
$chart->addColumn(Column::annotation());
$chart->addRows(
    ['2010', 10, 24, 20, 32, 18, 5, ''],
    ['2020', 16, 22, 23, 30, 16, 9, ''],
    ['2030', 28, 19, 29, 30, 12, 13, '']
);

$chart->options->height = 300;
$chart->options->width = 411;
$chart->options->isStacked = ChartStacked::Percent;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::Top, maxLines: 3);
$chart->options->vAxis = new ChartAxis(minValue: 0, ticks: [0, .3, .6, .9, 1]);

// ********************************
// Sales-Chart using Material design
// ********************************
$chart = $chartService->createColumnChart('element', design: ChartDesign::Material);
$chart->addColumn(new Column(ColumnType::String, 'Element'));
$chart->addColumn(new Column(ColumnType::Number, 'Sales'));
$chart->addColumn(new Column(ColumnType::Number, 'Expenses'));
$chart->addColumn(new Column(ColumnType::Number, 'Profit'));
$chart->addRows(
    ['2014', 1000, 400, 200],
    ['2015', 1170, 460, 250],
    ['2016', 660, 1120, 300],
    ['2017', 1030, 540, 350]
);

$chart->options->height = 500;
$chart->options->width = 800;
$chart->options->chart = new ChartTitle('Company Performance', 'Sales, Expenses, and Profit: 2014-2017');

// Draw all charts
echo $chartService->render('genre');
echo $chartService->render('element');
