<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();
$chart = $chartService->createAreaChart('performance');
$chart->addColumn(new Column(ColumnType::String, 'Year'));
$chart->addColumn(new Column(ColumnType::Number, 'Sales'));
$chart->addColumn(new Column(ColumnType::Number, 'Expenses'));
$chart->addRows(
    ['2013',  1000,      400],
    ['2014',  1170,      460],
    ['2015',  660,       1120],
    ['2016',  1030,      540]
);

$chart->options->height = 500;
$chart->options->width = 856;
$chart->options->title = 'Company Performance';
$chart->options->hAxis = new ChartAxis(title: 'Year', titleTextStyle: new ChartTextStyle(color: '#333'));
$chart->options->vAxis = new ChartAxis(minValue: 0);

echo $chartService->render('performance');
