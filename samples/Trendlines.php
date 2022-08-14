<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\Trendline\ChartTrendline;
use Sportlog\GoogleCharts\Charts\Options\Common\Trendline\ChartTrendlineCollection;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Scatter-Chart with trendlines
// ********************************
$data = DataTable::fromArray([
    ['Diameter', 'Age'],
    [8, 37], [4, 19.5], [11, 52], [4, 22], [3, 16.5], [6.5, 32.8], [14, 72]
]);


$chart = $chartService->createScatterChart('trendlines', $data);
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->title = 'Age of sugar maples vs. trunk diameter, in inches';
$chart->options->hAxis = new ChartAxis(title: 'Diameter');
$chart->options->vAxis = new ChartAxis(title: 'Age');
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$chart->options->trendlines = new ChartTrendlineCollection();
$chart->options->trendlines->add(new ChartTrendline(), 0);

// Draw all charts
echo $chartService->render('trendlines');
