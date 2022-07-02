<?php

require_once 'vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\{Options\BackgroundColor, Options\Slice, PieChart, TimelineChart};

$timelineChart = new TimelineChart('bikeUsage');
$timelineChart->options->setBackgroundColor(new BackgroundColor('23', 233, '234'));


$pieChart = new PieChart('pieBikeUsage');
$pieChart->options->setSlices([
    new Slice('red', 1.0),
    new Slice(),
    new Slice('blue', 1.2),
]);
echo json_encode($pieChart, JSON_PRETTY_PRINT);