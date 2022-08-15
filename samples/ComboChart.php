<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSeriesOptions;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSeriesOptionsCollection;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSeriesType;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Month'));
$data->addColumn(new Column(ColumnType::Number, 'Bolivia'));
$data->addColumn(new Column(ColumnType::Number, 'Ecuador'));
$data->addColumn(new Column(ColumnType::Number, 'Madagascar'));
$data->addColumn(new Column(ColumnType::Number, 'Papua New Guinea'));
$data->addColumn(new Column(ColumnType::Number, 'Rwanda'));
$data->addColumn(new Column(ColumnType::Number, 'Average'));
$data->addRows([
    ['2004/05',  165,      938,         522,             998,           450,      614.6],
    ['2005/06',  135,      1120,        599,             1268,          288,      682],
    ['2006/07',  157,      1167,        587,             807,           397,      623],
    ['2007/08',  139,      1110,        615,             968,           215,      609.4],
    ['2008/09',  136,      691,         629,             1026,          366,      569.6]
]);

$chart = $chartService->createComboChart('coffee', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->title = 'Monthly Coffee Production by Country';
$chart->options->hAxis = new ChartAxis(title: 'Month');
$chart->options->vAxis = new ChartAxis(title: 'Cups');
$chart->options->seriesType = ChartSeriesType::Bars;
$chart->options->series = new ChartSeriesOptionsCollection();
$chart->options->series->add(new ChartSeriesOptions(type: ChartSeriesType::Line), 5);

echo $chartService->render('coffee');
