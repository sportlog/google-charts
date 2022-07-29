<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts;

use Sportlog\GoogleCharts\Charts\Base\{ChartType, GoogleChart};
use Sportlog\GoogleCharts\Charts\Options\CandlestickChart\CandlestickChartOptions;

/**
 * Candlestick chart
 * @see https://developers.google.com/chart/interactive/docs/gallery/candlestickchart
 */
class CandlestickChart extends GoogleChart
{
    /**
     * Creates a new Candlestick chart instance
     *
     * @param string $id
     * @param CandlestickChartOptions $options
     */
    public function __construct(
        string $id,
        public readonly CandlestickChartOptions $options = new CandlestickChartOptions()
    ) {
        parent::__construct($id, ChartType::Candlestick, $options);
    }
}
