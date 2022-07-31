<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\GeoChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;

/**
 * GeoChartLegend.
 */
class GeoChartLegend extends NotNullSerializer
{
    public function __construct(
        public ?string $numberFormat = null,
        public ?ChartTextStyle $textStyle = null
    ) {
    }
}
