<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

$data = DataTable::fromArray([
    ['Director (Year)',  'Rotten Tomatoes', 'IMDB'],
    ['Alfred Hitchcock (1935)', 8.4,         7.9],
    ['Ralph Thomas (1959)',     6.9,         6.5],
    ['Don Sharp (1978)',        6.5,         6.4],
    ['James Hawes (2008)',      4.4,         6.2]
]);

$chart = $chartService->createSteppedAreaChart('rating', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->title = 'The decline of \'The 39 Steps\'';
$chart->options->vAxis = new ChartAxis(title: 'Accumulated Rating');
$chart->options->isStacked = true;

echo $chartService->render('rating');
