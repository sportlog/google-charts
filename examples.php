<?php

use Sportlog\GoogleCharts\Charts\Options\Common\{Axis\ChartAxis, Axis\ChartGridlines, Axis\ChartGridlinesFormat, Axis\ChartGridlinesUnit, ChartBackgroundColor};
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartSlice;
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineOptions;
use Sportlog\GoogleCharts\ChartService;

require_once 'vendor/autoload.php';

$chartService = new ChartService();

$timelineChart = $chartService->createTimelineChart('timelineChart');
$timelineChart->options->backgroundColor = new ChartBackgroundColor('23', 233, '234');
$timelineChart->options->timeline = new TimelineOptions();
$timelineChart->options->timeline->showRowLabels = true;
echo json_encode($timelineChart, JSON_PRETTY_PRINT);

$pieChart = $chartService->createPieChart('pieChart');
$pieChart->options->slices = [
    new PieChartSlice('red', 1.0),
    new PieChartSlice(),
    new PieChartSlice('blue', 1.2),
];
echo json_encode($pieChart, JSON_PRETTY_PRINT);


$areaChart = $chartService->createAreaChart('areaChart');
$areaChart->options->vAxis = new ChartAxis(title: 'some title');
$areaChart->options->vAxis->gridlines = new ChartGridlines(units: new ChartGridlinesUnit(seconds: new ChartGridlinesFormat('ss')));
echo json_encode($areaChart, JSON_PRETTY_PRINT);
