<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
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
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Task ID'));
$data->addColumn(new Column(ColumnType::String, 'Task Name'));
$data->addColumn(new Column(ColumnType::Date, 'Start'));
$data->addColumn(new Column(ColumnType::Date, 'End'));
$data->addColumn(new Column(ColumnType::Number, 'Duration'));
$data->addColumn(new Column(ColumnType::Number, 'Percent Complete'));
$data->addColumn(new Column(ColumnType::String, 'Dependencies'));

$data->addRows(
    [
        'Research', 'Find sources',
        $date(2015, 1, 1), $date(2015, 1, 5), null,  100,  null
    ],
    [
        'Write', 'Write paper',
        null, $date(2015, 1, 9), $daysToMilliseconds(3), 25, 'Research,Outline'
    ],
    [
        'Cite', 'Create bibliography',
        null, $date(2015, 1, 7), $daysToMilliseconds(1), 20, 'Research'
    ],
    [
        'Complete', 'Hand in paper',
        null, $date(2015, 1, 10), $daysToMilliseconds(1), 0, 'Cite,Write'
    ],
    [
        'Outline', 'Outline paper',
        null, $date(2015, 1, 6), $daysToMilliseconds(1), 100, 'Research'
    ]
);

$chart = $chartService->createGanttChart('paper', $data);
$chart->options->height = 275;
$chart->options->width = 856;

// ********************************
// Trains-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Task ID'));
$data->addColumn(new Column(ColumnType::String, 'Task Name'));
$data->addColumn(new Column(ColumnType::String, 'Resource'));
$data->addColumn(new Column(ColumnType::Date, 'Start'));
$data->addColumn(new Column(ColumnType::Date, 'End'));
$data->addColumn(new Column(ColumnType::Number, 'Duration'));
$data->addColumn(new Column(ColumnType::Number, 'Percent Complete'));
$data->addColumn(new Column(ColumnType::String, 'Dependencies'));

$data->addRows(
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

$chart = $chartService->createGanttChart('trains', $data);
$chart->options->height = 275;
$chart->options->width = 856;
$chart->options->gantt = new GanttOptions(defaultStartDate: new DateTime('2015-03-28'));

// Draw all charts
echo $chartService->render('paper');
echo $chartService->render('trains');
