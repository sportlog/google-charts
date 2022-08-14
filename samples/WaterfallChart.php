<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\CandlestickChart\CandlestickChartOptions;
use Sportlog\GoogleCharts\Charts\Options\Common\Axis\ChartAxis;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartBackgroundColor;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartCandleStick;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartGroupWidth;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegend;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartLegend\ChartLegendPosition;
use Sportlog\GoogleCharts\Charts\Options\Common\Trendline\ChartTrendline;
use Sportlog\GoogleCharts\Charts\Options\Common\Trendline\ChartTrendlineCollection;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Waterfall
// ********************************
$data = DataTable::fromArray([
    ['Mon', 28, 28, 38, 38],
    ['Tue', 38, 38, 55, 55],
    ['Wed', 55, 55, 77, 77],
    ['Thu', 77, 77, 66, 66],
    ['Fri', 66, 66, 22, 22]
    // Treat the first row as data.
], true);

$chart = $chartService->createCandlestickChart('waterfall', $data);
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->bar = new ChartGroupWidth('100%');
$chart->options->legend = new ChartLegend(position: ChartLegendPosition::None);
$chart->options->candlestick = new ChartCandleStick(
    fallingColor: new ChartBackgroundColor(strokeWidth: 0, fill: '#a52714'),
    risingColor: new ChartBackgroundColor(strokeWidth: 0, fill: '#0f9d58')
);

// Draw all charts
echo $chartService->render('waterfall');
