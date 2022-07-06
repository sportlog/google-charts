<?php

require_once 'vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\{Options\BackgroundColor, PieChart, TimelineChart};
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieSlice;
use Sportlog\GoogleCharts\Charts\Options\TimelineOptions;

$timelineChart = new TimelineChart('bikeUsage');
$timelineChart->options->backgroundColor = new BackgroundColor('23', 233, '234');
$timelineChart->options->timeline = new TimelineOptions();
$timelineChart->options->timeline->showRowLabels = true;
echo json_encode($timelineChart, JSON_PRETTY_PRINT);

$pieChart = new PieChart('pieBikeUsage');
$pieChart->options->slices = [
    new PieSlice('red', 1.0),
    new PieSlice(),
    new PieSlice('blue', 1.2),
];
echo json_encode($pieChart, JSON_PRETTY_PRINT);