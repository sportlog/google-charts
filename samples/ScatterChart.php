<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\ChartDesign;
use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxisCollection;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSeriesOptions;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSeriesOptionsCollection;
use Sportlog\GoogleCharts\ChartService;
use Sportlog\GoogleCharts\Test\ColumnTest;

$chartService = new ChartService();

// ********************************
// Student final grades-Chart (Classic)
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::Number, 'Student ID'));
$data->addColumn(new Column(ColumnType::Number, 'Hours Studied'));
$data->addColumn(new Column(ColumnType::Number, 'Final'));

$data->addRows([
    [0, 0, 67],
    [1, 1, 88],
    [2, 2, 77],
    [3, 3, 93],
    [4, 4, 85],
    [5, 5, 91],
    [6, 6, 71],
    [7, 7, 78],
    [8, 8, 93],
    [9, 9, 80],
    [10, 10, 82],
    [11, 0, 75],
    [12, 5, 80],
    [13, 3, 90],
    [14, 1, 72],
    [15, 5, 75],
    [16, 6, 68],
    [17, 7, 98],
    [18, 3, 82],
    [19, 9, 94],
    [20, 2, 79],
    [21, 2, 95],
    [22, 2, 86],
    [23, 3, 67],
    [24, 4, 60],
    [25, 2, 80],
    [26, 6, 92],
    [27, 2, 81],
    [28, 8, 79],
    [29, 9, 83]
]);

$chart = $chartService->createScatterChart('grades_classic', $data);
$chart->options->width = 800;
$chart->options->height = 500;
$chart->options->series = new ChartSeriesOptionsCollection();
$chart->options->series->add(new ChartSeriesOptions(targetAxisIndex: 0), 0);
$chart->options->series->add(new ChartSeriesOptions(targetAxisIndex: 1), 1);
$chart->options->title = 'Students\' Final Grades - based on hours studied';
$chart->options->vAxes = new ChartAxisCollection();
$chart->options->vAxes->add(new ChartAxis(title: 'Hours Studied'), 0);
$chart->options->vAxes->add(new ChartAxis(title: 'Final Exam Grade'), 1);

// ********************************
// Student final grades-Chart (Material)
// ********************************
$chart = $chartService->createScatterChart('grades_material', $data, design: ChartDesign::Material);
$chart->options->width = 800;
$chart->options->height = 500;
$chart->options->series = new ChartSeriesOptionsCollection();
$chart->options->series->add(new ChartSeriesOptions(targetAxisIndex: 0), 0);
$chart->options->series->add(new ChartSeriesOptions(targetAxisIndex: 1), 1);
$chart->options->title = 'Students\' Final Grades - based on hours studied';
$chart->options->vAxes = new ChartAxisCollection();
$chart->options->vAxes->add(new ChartAxis(title: 'Hours Studied'), 0);
$chart->options->vAxes->add(new ChartAxis(title: 'Final Exam Grade'), 1);

// Draw all charts
echo $chartService->render('grades_classic');
echo $chartService->render('grades_material');
