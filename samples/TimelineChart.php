<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Presidents-Chart
// ********************************
$chart = $chartService->createTimelineChart('presidents');
$chart->addColumn(new Column(ColumnType::String, id: 'President'));
$chart->addColumn(new Column(ColumnType::Date, id: 'Start'));
$chart->addColumn(new Column(ColumnType::Date, id: 'End'));

$date = function (int $year, int $month = 1, int $day = 1): DateTime {
    $result = new DateTime();
    $result->setTimestamp(mktime(0, 0, 0, $month, $day, $year));
    return $result;
};

$chart->addRows(
    ['Washington', $date(1789, 3, 30), $date(1797, 2, 4)],
    ['Adams',      $date(1797, 2, 4),  $date(1801, 2, 4)],
    ['Jefferson',  $date(1801, 2, 4),  $date(1809, 2, 4)]
);

$chart->options->height = 180;
$chart->options->width = 856;

// Draw all charts
echo $chartService->render('presidents');
