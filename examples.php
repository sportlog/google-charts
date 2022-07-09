<?php

require_once 'vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Options\ChartBackgroundColor;
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartSlice;
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineOptions;
use Sportlog\GoogleCharts\Charts\PieChart;
use Sportlog\GoogleCharts\Charts\TimelineChart;

$timelineChart = new TimelineChart('bikeUsage');
$timelineChart->options->backgroundColor = new ChartBackgroundColor('23', 233, '234');
$timelineChart->options->timeline = new TimelineOptions();
$timelineChart->options->timeline->showRowLabels = true;
echo json_encode($timelineChart, JSON_PRETTY_PRINT);

$pieChart = new PieChart('pieBikeUsage');
$pieChart->options->slices = [
    new PieChartSlice('red', 1.0),
    new PieChartSlice(),
    new PieChartSlice('blue', 1.2),
];
echo json_encode($pieChart, JSON_PRETTY_PRINT);