<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\BubbleChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartTextStyle;

/**
 * BubbleChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/bubblechart#configuration-options
 */
class ChartBubble extends NotNullSerializer
{
    public function __construct(
        public ?float $opacity = null,
        public ?string $stroke = null,
        public ?ChartTextStyle $textStyle = null
    ) {
    }
}
