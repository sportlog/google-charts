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
use Sportlog\GoogleCharts\Charts\Options\Common\ChartArea;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartOrientation;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTitle;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartGroupWidth;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Population-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'City'));
$data->addColumn(new Column(ColumnType::Number, '2010 Population'));
$data->addColumn(new Column(ColumnType::Number, '2020 Population'));
$data->addRows([
    ['New York City, NY', 8175000, 8008000],
    ['Los Angeles, CA', 3792000, 3694000],
    ['Chicago, IL', 2695000, 2896000],
    ['Houston, TX', 2099000, 1953000],
    ['Philadelphia, PA', 1526000, 1517000]
]);

$chart = $chartService->createBarChart('population', $data);
$chart->options->height = 300;
$chart->options->width = 713;
$chart->options->title = 'Population of Largest U.S. Cities';
$chart->options->chartArea = new ChartArea(width: '50%');
$chart->options->hAxis = new ChartAxis(
    title: 'Total Population',
    minValue: 0,
    textStyle: new ChartTextStyle(bold: true, fontSize: 12, color: '#4d4d4d'),
    titleTextStyle: new ChartTextStyle(bold: true, fontSize: 18, color: '#4d4d4d')
);
$chart->options->vAxis = new ChartAxis(
    title: 'City',
    textStyle: new ChartTextStyle(bold: true, fontSize: 14, color: '#848484'),
    titleTextStyle: new ChartTextStyle(bold: true, fontSize: 14, color: '#848484')
);

// ********************************
// Genre-Chart
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
$data->addRows([
    ['2010', 10, 24, 20, 32, 18, 5, ''],
    ['2020', 16, 22, 23, 30, 16, 9, ''],
    ['2030', 28, 19, 29, 30, 12, 13, '']
]);

$chart = $chartService->createBarChart('genre', $data);
$chart->options->height = 400;
$chart->options->width = 600;
$chart->options->isStacked = true;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::Top, maxLines: 3);
$chart->options->bar = new ChartGroupWidth('75%');


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

$chart = $chartService->createBarChart('element', $data, design: ChartDesign::Material);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->chart = new ChartTitle('Company Performance', 'Sales, Expenses, and Profit: 2014-2017');
// When set to 'horizontal', the orientation will resemble the traditional Classic Bar Chart; otherwise, the bars will be vertical.
$chart->options->bars = ChartOrientation::Horizontal;

// Draw all charts
echo $chartService->render();
