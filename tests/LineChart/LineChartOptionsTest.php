<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Test\LineChart;

use PHPUnit\Framework\TestCase;
use Sportlog\GoogleCharts\Charts\Options\Common\{ChartLegend\ChartLegend, ChartLegend\ChartLegendPosition, ChartCurveType};
use Sportlog\GoogleCharts\Charts\Options\LineChart\{LineChartInterval, LineChartIntervalCollection, LineChartIntervalStyle, LineChartOptions};

final class LineChartOptionsTest extends TestCase
{
    public function testIntervalsSerialization(): void
    {
        $options = new LineChartOptions();
        $options->title = 'Line intervals, tailored';
        $options->height = 500;
        $options->width = 900;
        $options->curveType = ChartCurveType::Function;
        $options->lineWidth = 4;
        $options->legend = new ChartLegend(position: ChartLegendPosition::None);
        $options->interval = new LineChartIntervalCollection();
        $options->interval->add(new LineChartInterval(LineChartIntervalStyle::Line, '#D3362D', lineWidth: 0.5), 'i0');
        $options->interval->add(new LineChartInterval(LineChartIntervalStyle::Line, '#F1CA3A', lineWidth: 1), 'i1');
        $options->interval->add(new LineChartInterval(LineChartIntervalStyle::Line, '#5F9654', lineWidth: 2), 'i2');

        $expectedJson = <<<EOL
        {
            "width": 900,
            "height": 500,
            "curveType": "function",
            "interval": {
                "i0": {
                    "style": "line",
                    "color": "#D3362D",
                    "lineWidth": 0.5
                },
                "i1": {
                    "style": "line",
                    "color": "#F1CA3A",
                    "lineWidth": 1
                },
                "i2": {
                    "style": "line",
                    "color": "#5F9654",
                    "lineWidth": 2
                }
            },
            "legend": {
                "position": "none"
            },
            "lineWidth": 4,
            "title": "Line intervals, tailored"
        }
        EOL;

        $json = json_encode($options, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }
}
