<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Options\GanttChart\GanttOptions;
use Sportlog\GoogleCharts\ChartService;

$toMilliSeconds = function (int $minutes): int {
    return $minutes * 60 * 1000;
};

$daysToMilliseconds = fn (int $days): int => $days * 24 * 60 * 60 * 1000;

$date = function (int $year, int $month = 1, int $day = 1): DateTime {
    $result = new DateTime();
    $result->setTimestamp(mktime(0, 0, 0, $month, $day, $year));
    return $result;
};

$chartService = new ChartService();

// ********************************
// Paper-Chart
// ********************************
$chart = $chartService->createGanttChart('paper');
$chart->addColumn(new Column(ColumnType::String, 'Task ID'));
$chart->addColumn(new Column(ColumnType::String, 'Task Name'));
$chart->addColumn(new Column(ColumnType::Date, 'Start'));
$chart->addColumn(new Column(ColumnType::Date, 'End'));
$chart->addColumn(new Column(ColumnType::Number, 'Duration'));
$chart->addColumn(new Column(ColumnType::Number, 'Percent Complete'));
$chart->addColumn(new Column(ColumnType::String, 'Dependencies'));

$chart->addRows(
    [
        'Research', 'Find sources',
        $date(2015, 0, 1), $date(2015, 0, 5), null,  100,  null
    ],
    [
        'Write', 'Write paper',
        null, $date(2015, 0, 9), $daysToMilliseconds(3), 25, 'Research,Outline'
    ],
    [
        'Cite', 'Create bibliography',
        null, $date(2015, 0, 7), $daysToMilliseconds(1), 20, 'Research'
    ],
    [
        'Complete', 'Hand in paper',
        null, $date(2015, 0, 10), $daysToMilliseconds(1), 0, 'Cite,Write'
    ],
    [
        'Outline', 'Outline paper',
        null, $date(2015, 0, 6), $daysToMilliseconds(1), 100, 'Research'
    ]
);

$chart->options->height = 275;
$chart->options->width = 856;

// ********************************
// Trains-Chart
// ********************************
$chart = $chartService->createGanttChart('trains');
$chart->addColumn(new Column(ColumnType::String, 'Task ID'));
$chart->addColumn(new Column(ColumnType::String, 'Task Name'));
$chart->addColumn(new Column(ColumnType::String, 'Resource'));
$chart->addColumn(new Column(ColumnType::Date, 'Start'));
$chart->addColumn(new Column(ColumnType::Date, 'End'));
$chart->addColumn(new Column(ColumnType::Number, 'Duration'));
$chart->addColumn(new Column(ColumnType::Number, 'Percent Complete'));
$chart->addColumn(new Column(ColumnType::String, 'Dependencies'));

$chart->addRows(
    [
        "toTrain",
        "Walk to train stop",
        "walk",
        null,
        null,
        $toMilliSeconds(5),
        100,
        null,
    ],
    [
        "music",
        "Listen to music",
        "music",
        null,
        null,
        $toMilliSeconds(70),
        100,
        null,
    ],
    [
        "wait",
        "Wait for train",
        "wait",
        null,
        null,
        $toMilliSeconds(10),
        100,
        "toTrain",
    ],
    [
        "train",
        "Train ride",
        "train",
        null,
        null,
        $toMilliSeconds(45),
        75,
        "wait",
    ],
    [
        "toWork",
        "Walk to work",
        "walk",
        null,
        null,
        $toMilliSeconds(10),
        0,
        "train",
    ],
    [
        "work",
        "Sit down at desk",
        null,
        null,
        null,
        $toMilliSeconds(2),
        0,
        "toWork",
    ]
);

$chart->options->height = 275;
$chart->options->width = 856;
$chart->options->gantt = new GanttOptions(defaultStartDate: new DateTime('2015-03-28'));
// echo "<pre>" . json_encode($chart, JSON_PRETTY_PRINT) . "</pre>";

// Draw all charts
echo $chartService->render('paper');
echo $chartService->render('trains');
