<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Sportlog\GoogleCharts\Charts\Base\DataTable;
use Sportlog\GoogleCharts\Charts\Options\WordTreeChart\WordTreeFormat;
use Sportlog\GoogleCharts\Charts\Options\WordTreeChart\WordTreeOptions;
use Sportlog\GoogleCharts\ChartService;

$chartService = new ChartService();

// ********************************
// Waterfall
// ********************************
$data = DataTable::fromArray([
    ['Phrases'],
    ['cats are better than dogs'],
    ['cats eat kibble'],
    ['cats are better than hamsters'],
    ['cats are awesome'],
    ['cats are people too'],
    ['cats eat mice'],
    ['cats meowing'],
    ['cats in the cradle'],
    ['cats eat mice'],
    ['cats in the cradle lyrics'],
    ['cats eat kibble'],
    ['cats for adoption'],
    ['cats are family'],
    ['cats eat mice'],
    ['cats are better than kittens'],
    ['cats are evil'],
    ['cats are weird'],
    ['cats eat mice'],
]);

$chart = $chartService->createWordTreeChart('cats', $data);
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->wordtree = new WordTreeOptions(
    WordTreeFormat::Implicit,
    word: 'cats'
);


// Draw all charts
echo $chartService->render('cats');
