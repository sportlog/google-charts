<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartSlice;
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartSliceCollection;
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartSliceText;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();
$chart = $chartService->createPieChart('dailyActivities');
$chart->addColumn(new Column(ColumnType::String, 'Task'));
$chart->addColumn(new Column(ColumnType::Number, 'Hours per Day'));

$chart->addRow(['Work',     11]);
$chart->addRow(['Eat',      2]);
$chart->addRow(['Commute',  2]);
$chart->addRow(['Watch TV', 2]);
$chart->addRow(['Sleep',    7]);

$chart->options->title = 'My Daily Activities';
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->pieHole = 0.4;

// Slices
$chart = $chartService->createPieChart('languageUse');
$chart->addColumn(new Column(ColumnType::String, 'Language'));
$chart->addColumn(new Column(ColumnType::Number, 'Speakers (in millions)'));
$chart->addRows(
    ['Assamese', 13],
    ['Bengali', 83],
    ['Bodo', 1.4],
    ['Dogri', 2.3],
    ['Gujarati', 46],
    ['Hindi', 300],
    ['Kannada', 38],
    ['Kashmiri', 5.5],
    ['Konkani', 5],
    ['Maithili', 20],
    ['Malayalam', 33],
    ['Manipuri', 1.5],
    ['Marathi', 72],
    ['Nepali', 2.9],
    ['Oriya', 33],
    ['Punjabi', 29],
    ['Sanskrit', 0.01],
    ['Santhali', 6.5],
    ['Sindhi', 2.5],
    ['Tamil', 61],
    ['Telugu', 74],
    ['Urdu', 52]
);

$chart->options->title = 'Indian Language Use';
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$chart->options->pieSliceText = PieChartSliceText::Label;
$chart->options->slices = new PieChartSliceCollection();
$chart->options->slices->add(new PieChartSlice(offset: 0.2), 4);
$chart->options->slices->add(new PieChartSlice(offset: 0.3), 12);
$chart->options->slices->add(new PieChartSlice(offset: 0.4), 14);
$chart->options->slices->add(new PieChartSlice(offset: 0.5), 15);

// Pizza
$chart = $chartService->createPieChart('pizza');
$chart->addColumn(new Column(ColumnType::String, 'Pizza'));
$chart->addColumn(new Column(ColumnType::Number, 'Populartiy'));
$chart->addRows(
    ['Pepperoni', 33],
    ['Hawaiian', 26],
    ['Mushroom', 22],
    ['Sausage', 10], // Below limit.
    ['Anchovies', 9]
);

$chart->options->title = 'Popularity of Types of Pizza';
$chart->options->height = 285;
$chart->options->width = 900;
$chart->options->sliceVisibilityThreshold = 0.2;

echo $chartService->render('dailyActivities');
echo $chartService->render('languageUse');
echo $chartService->render('pizza');
