<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, Axis\ChartGridlines, Axis\ChartGridlinesFormat, Axis\ChartGridlinesUnit, Trendline\ChartTrendline, Trendline\ChartTrendlineCollection, ChartBackgroundColor};
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartSlice;
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineOptions;
use Sportlog\GoogleCharts\ChartService;

require_once 'vendor/autoload.php';

$chartService = new ChartService();

$pieChart = $chartService->createPieChart('dailyActivities');
$pieChart->addColumn('Task', ColumnType::String);
$pieChart->addColumn('Hours per Day', ColumnType::Number);

$pieChart->addRow(['Work',     11]);
$pieChart->addRow(['Eat',      2]);
$pieChart->addRow(['Commute',  2]);
$pieChart->addRow(['Watch TV', 2]);
$pieChart->addRow(['Sleep',    7]);

$pieChart->options->title = 'My Daily Activities';
$pieChart->options->width = 900;
$pieChart->options->height = 500;

echo "<p>Pie Chart</p>";
echo $chartService->render('dailyActivities');


// $timelineChart = $chartService->createTimelineChart('timelineChart');
// $timelineChart->options->backgroundColor = new ChartBackgroundColor('23', 233, '234');
// $timelineChart->options->timeline = new TimelineOptions();
// $timelineChart->options->timeline->showRowLabels = true;
// echo json_encode($timelineChart, JSON_PRETTY_PRINT);

// $pieChart = $chartService->createPieChart('pieChart');
// $pieChart->options->slices = [
//     new PieChartSlice('red', 1.0),
//     new PieChartSlice(),
//     new PieChartSlice('blue', 1.2),
// ];
// echo json_encode($pieChart, JSON_PRETTY_PRINT);


// $areaChart = $chartService->createAreaChart('areaChart');
// $areaChart->options->vAxis = new ChartAxis(title: 'some title');
// $areaChart->options->vAxis->gridlines = new ChartGridlines(units: new ChartGridlinesUnit(seconds: new ChartGridlinesFormat('ss')));
// echo json_encode($areaChart, JSON_PRETTY_PRINT);


// $trendline = new ChartTrendlineCollection();
// $trendline->add(new ChartTrendline(lineWidth: 2, opacity: 3.1), 1);
// $trendline->add(new ChartTrendline(degree: 2, opacity: 3.4), 4);
// $trendline->add(new ChartTrendline(color: 'red', opacity: 3.4), 2);
// echo json_encode($trendline, JSON_PRETTY_PRINT);