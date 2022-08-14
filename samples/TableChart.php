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
// Salary-Chart
// ********************************
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Name'));
$data->addColumn(new Column(ColumnType::Number, 'Salary'));
$data->addColumn(new Column(ColumnType::Bool, 'Full Time Employee'));

$data->addRow(['Mike',  10000, true], [null, '$10,000', null]);
$data->addRow(['Jim',   8000,  false], [null, '$8,000', null]);
$data->addRow(['Alice', 12500, true], [null, '$12,500', null]);
$data->addRow(['Bob',   7000,  true], [null, '$7000', null]);

$chart = $chartService->createTableChart('salary', $data);
$chart->options->width = 856;
$chart->options->showRowNumber = true;

// Draw all charts
echo $chartService->render('salary');
