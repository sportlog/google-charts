<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\Column;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;
use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\ChartService;


$chartService = new ChartService();

// ********************************
// Computational resources-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Label'));
$data->addColumn(new Column(ColumnType::Number, 'Value'));
$data->addRows(
    ['Memory', 80],
    ['CPU', 55],
    ['Network', 68]
);

$chart = $chartService->createGaugeChart('compresources', $data);
$chart->options->height = 120;
$chart->options->width = 400;
$chart->options->redFrom = 90;
$chart->options->redTo = 120;
$chart->options->yellowFrom = 75;
$chart->options->yewllowTo = 90;
$chart->options->minorTicks = 5;

// Draw all charts
echo $chartService->render('compresources');

?>

<script>
    GoogleCharts.setOnLoadCallback(function(id, chart, data, options) {
        if (id === 'compresources') {
            setInterval(function() {
                data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                chart.draw(data, options);
            }, 13000);
            setInterval(function() {
                data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
                chart.draw(data, options);
            }, 5000);
            setInterval(function() {
                data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
                chart.draw(data, options);
            }, 26000);
        }
    });
</script>