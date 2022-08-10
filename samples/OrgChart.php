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
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Name'));
$data->addColumn(new Column(ColumnType::String, 'Manager'));
$data->addColumn(new Column(ColumnType::String, 'ToolTip'));
$data->addRow(['Mike', '', 'President'], ['Mike<div style="color:red; font-style:italic">President</div>']);
$data->addRow(['Jim', 'Mike', 'VP'], ['Jim<div style="color:red; font-style:italic">Vice President</div>']);
$data->addRows(
    ['Alice', 'Mike', ''],
    ['Bob', 'Jim', 'Bob Sponge'],
    ['Carol', 'Bob', '']
);

$chart = $chartService->createOrgChart('organization', $data);
$chart->options->allowHtml = true;

echo $chartService->render('organization');
