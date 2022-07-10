<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

/**
 * Google chart types
 */
enum ChartType: string {
    case Area = 'Area';
    case Calendar = 'Calendar';
    case Candlestick = 'Candlestick';
    case Bar = 'Bar';
    case Bubble = 'Bubble';
    case Column = 'Column';
    case Combo = 'Combo';
    case Gantt = 'Gantt';
    case Gauge = 'Gauge';
    case Geo = 'Geo';
    case Histogram = 'Histogram';
    case Line = 'Line';
    case Map = 'Map';
    case Org = 'Org';
    case Pie = 'Pie';
    case Sankey = 'Sankey';
    case Scatter = 'Scatter';
    case SteppedArea = 'SteppedArea';
    case Table = 'Table';
    case Timeline = 'Timeline';
    case TreeMap = 'TreeMap';
}