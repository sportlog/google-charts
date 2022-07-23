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
$pieChart = $chartService->createPieChart('dailyActivities');
$pieChart->addColumn(new Column(ColumnType::String, 'Task'));
$pieChart->addColumn(new Column(ColumnType::Number, 'Hours per Day'));

$pieChart->addRow(['Work',     11]);
$pieChart->addRow(['Eat',      2]);
$pieChart->addRow(['Commute',  2]);
$pieChart->addRow(['Watch TV', 2]);
$pieChart->addRow(['Sleep',    7]);

$pieChart->options->title = 'My Daily Activities';
$pieChart->options->width = 900;
$pieChart->options->height = 500;
$pieChart->options->pieHole = 0.4;

// Slices
$languagePie = $chartService->createPieChart('languageUse');
$languagePie->addColumn(new Column(ColumnType::String, 'Language'));
$languagePie->addColumn(new Column(ColumnType::Number, 'Speakers (in millions)'));
$languagePie->addRows(
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

$languagePie->options->title = 'Indian Language Use';
$languagePie->options->width = 900;
$languagePie->options->height = 500;
$languagePie->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$languagePie->options->pieSliceText = PieChartSliceText::Label;
$languagePie->options->slices = new PieChartSliceCollection();
$languagePie->options->slices->add(new PieChartSlice(offset: 0.2), 4);
$languagePie->options->slices->add(new PieChartSlice(offset: 0.3), 12);
$languagePie->options->slices->add(new PieChartSlice(offset: 0.4), 14);
$languagePie->options->slices->add(new PieChartSlice(offset: 0.5), 15);

// Pizza
$pizzaPie = $chartService->createPieChart('pizza');
$pizzaPie->addColumn(new Column(ColumnType::String, 'Pizza'));
$pizzaPie->addColumn(new Column(ColumnType::Number, 'Populartiy'));
$pizzaPie->addRows(
    ['Pepperoni', 33],
    ['Hawaiian', 26],
    ['Mushroom', 22],
    ['Sausage', 10], // Below limit.
    ['Anchovies', 9]
);

$pizzaPie->options->title = 'Popularity of Types of Pizza';
$pizzaPie->options->height = 285;
$pizzaPie->options->width = 900;
$pizzaPie->options->sliceVisibilityThreshold = 0.2;

echo $chartService->render('dailyActivities');
echo $chartService->render('languageUse');
echo $chartService->render('pizza');
