# Google-charts
PHP Wrapper for Google charts library (https://developers.google.com/chart/)

Features:
* Typed chart options. You can use intellisense to set any chart option.
* 
* Supported charts: Annotation, Area, Bar, Bubble, Calendar, Candlestick, Column, Combo, Gantt, Gauge, Geo, Histogram, Line, Map, Org, Pie, Scatter, SteppedArea, Table, Timeline, TreeMap and WordTree.

# Install using composer
You can install sportlg/google-charts by using composer:
```
$ composer require sportlog/google-charts
```
Minimum PHP version required is 8.1.

# How to use

## 1. Create the chart service
Create the chart service instance. You can optionally provide two parameters:
* Settings: some charts require a mapsApiKey to work
* ScriptNonceProvider: The chart service needs to load the Google Charts API (https://www.gstatic.com/charts/loader.js). If you're using [CSP](https://en.wikipedia.org/wiki/Content_Security_Policy) you may want to provide a nonce for the script.

``` php
$chartService = new ChartService();
```

Preferably use DI to for the service!

## 2. Create the data
Create a datatable and add columns and rows:
``` php
$data = new DataTable();
$data = new DataTable();
$data->addColumn(new Column(ColumnType::String, 'Task'));
$data->addColumn(new Column(ColumnType::Number, 'Hours per Day'));

// add the rows: you can also use addRows to add an array of rows
$data->addRow(['Work',     11]);
$data->addRow(['Eat',      2]);
$data->addRow(['Commute',  2]);
$data->addRow(['Watch TV', 2]);
$data->addRow(['Sleep',    7]);
```

Alternatively you can also a the factory function which will auto create the columns by inferring their type from the first data row. This leads to the same result as above:
``` php
$data = DataTable::fromArray(
    [
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
    ]
);
```

## 3. Create the Chart
``` php
// pass a unique id to the chart; you will need it to draw it
$chart = $chartService->createPieChart('dailyActivities', $data);
// set options by using intellisense; for documentation see Google-Charts Homepage
$chart->options->title = 'My Daily Activities';
$chart->options->width = 900;
$chart->options->height = 500;
$chart->options->pieHole = 0.4;
```

## 4. Draw the chart
Use the ChartService to render your chart. If you're using a templating enginge (like Latte, Twig, ...) you should add a filter for this.

``` php
// draw the chart
echo $chartService->render('dailyActivities');
```

# Examples
You can find at least one example for each chart in the samples folder.
