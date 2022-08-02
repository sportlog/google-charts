<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\BubbleChart\ChartBubble;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartColorAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Life Expectancy/Fertility Rate-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'ID'));
$data->addColumn(new Column(ColumnType::Number, 'Life Expectancy'));
$data->addColumn(new Column(ColumnType::Number, 'Fertility Rate'));
$data->addColumn(new Column(ColumnType::String, 'Region'));
$data->addColumn(new Column(ColumnType::Number, 'Population'));

$data->addRows(
    ['CAN',    80.66,              1.67,      'North America',  33739900],
    ['DEU',    79.84,              1.36,      'Europe',         81902307],
    ['DNK',    78.6,               1.84,      'Europe',         5523095],
    ['EGY',    72.73,              2.78,      'Middle East',    79716203],
    ['GBR',    80.05,              2,         'Europe',         61801570],
    ['IRN',    72.49,              1.7,       'Middle East',    73137148],
    ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
    ['ISR',    81.55,              2.96,      'Middle East',    7485600],
    ['RUS',    68.6,               1.54,      'Europe',         141850000],
    ['USA',    78.09,              2.05,      'North America',  307007000]
);

$chart = $chartService->createBubbleChart('life', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->title = 'Fertility rate vs life expectancy in selected countries (2010). X=Life Expectancy, Y=Fertility, Bubble size=Population, Bubble color=Region';
$chart->options->hAxis = new ChartAxis(title: 'Life Expectancy');
$chart->options->vAxis = new ChartAxis(title: 'Fertility Rate');
$chart->options->bubble = new ChartBubble(textStyle: new ChartTextStyle(fontSize: 11));

// ********************************
// Temperature-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'ID'));
$data->addColumn(new Column(ColumnType::Number, 'X'));
$data->addColumn(new Column(ColumnType::Number, 'Y'));
$data->addColumn(new Column(ColumnType::Number, 'Temperature'));

$data->addRows(
    ['',   80,  167,      120],
    ['',   79,  136,      130],
    ['',   78,  184,      50],
    ['',   72,  278,      230],
    ['',   81,  200,      210],
    ['',   72,  170,      100],
    ['',   68,  477,      80]
);

$chart = $chartService->createBubbleChart('temperature', $data);
$chart->options->height = 500;
$chart->options->width = 900;
$chart->options->colorAxis = new ChartColorAxis(colors: ['yellow', 'red']);

// Draw all charts
echo $chartService->render('life');
echo $chartService->render('temperature');
