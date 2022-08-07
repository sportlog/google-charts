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
use Sportlog\GoogleCharts\Charts\Options\Common\ChartCurveType;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTitle;
use Sportlog\GoogleCharts\Charts\Options\LineChart\LineChartInterval;
use Sportlog\GoogleCharts\Charts\Options\LineChart\LineChartIntervalCollection;
use Sportlog\GoogleCharts\Charts\Options\LineChart\LineChartIntervalStyle;
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

// Intervals
$data = new DataTable();
$data->addColumn(new Column(ColumnType::Number, 'x'));
$data->addColumn(new Column(ColumnType::Number, 'x'));
$data->addColumn(new Column(ColumnType::Number, role: ColumnRole::Interval, id: 'i0'));
$data->addColumn(new Column(ColumnType::Number, role: ColumnRole::Interval, id: 'i1'));
$data->addColumn(new Column(ColumnType::Number, role: ColumnRole::Interval, id: 'i2'));
$data->addColumn(new Column(ColumnType::Number, role: ColumnRole::Interval, id: 'i2'));
$data->addColumn(new Column(ColumnType::Number, role: ColumnRole::Interval, id: 'i2'));
$data->addColumn(new Column(ColumnType::Number, role: ColumnRole::Interval, id: 'i2'));
$data->addRows(
    [1, 100, 90, 110, 85, 96, 104, 120],
    [2, 120, 95, 130, 90, 113, 124, 140],
    [3, 130, 105, 140, 100, 117, 133, 139],
    [4, 90, 85, 95, 85, 88, 92, 95],
    [5, 70, 74, 63, 67, 69, 70, 72],
    [6, 30, 39, 22, 21, 28, 34, 40],
    [7, 80, 77, 83, 70, 77, 85, 90],
    [8, 100, 90, 110, 85, 95, 102, 110]
);

$chart = $chartService->createLineChart('intervals', $data);
$chart->options->title = 'Line intervals, default';
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->curveType = ChartCurveType::Function;
$chart->options->lineWidth = 4;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$chart->options->intervals = new LineChartInterval(LineChartIntervalStyle::Line);

// Intervals, tailored
$chart = $chartService->createLineChart('intervals_tailored', $data);   // use last created datatable
$chart->options->title = 'Line intervals, tailored';
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->curveType = ChartCurveType::Function;
$chart->options->lineWidth = 4;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$chart->options->interval = new LineChartIntervalCollection();
$chart->options->interval->add(new LineChartInterval(LineChartIntervalStyle::Line, '#D3362D', lineWidth: 0.5), 'i0');
$chart->options->interval->add(new LineChartInterval(LineChartIntervalStyle::Line, '#F1CA3A', lineWidth: 1), 'i1');
$chart->options->interval->add(new LineChartInterval(LineChartIntervalStyle::Line, '#5F9654', lineWidth: 2), 'i2');

// Draw all charts
echo $chartService->render('performance');
echo $chartService->render('earnings');
echo $chartService->render('intervals');
echo $chartService->render('intervals_tailored');
