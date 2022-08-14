<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common\Axis;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;
use Sportlog\GoogleCharts\Charts\Options\Common\{ChartAxisTitlePosition, ChartTextStyle};

class ChartAxis extends NotNullSerializer
{
    public function __construct(
        public ?float $baseline = null,
        public ?string $baselineColor = null,
        public ?int $direction = null,
        public ?string $format = null,
        public ?ChartGridlines $gridlines = null,
        public ?ChartGridlines $minorGridlines = null,
        public ?bool $logScale = null,
        public ?ChartScaleType $scaleType = null,
        public ?ChartAxisTitlePosition $textPosition = null,
        public ?ChartTextStyle $textStyle = null,
        public ?array $ticks = null,
        public ?string $title = null,
        public ?ChartTextStyle $titleTextStyle = null,
        public ?bool $allowContainerBoundaryTextCutoff = null,
        public ?bool $slantedText = null,
        public ?int $slantedTextAngle = null,
        public ?int $maxAlternation = null,
        public ?int $maxTextLines = null,
        public ?int $minTextSpacing = null,
        public ?int $showTextEvery = null,
        public ?int $maxValue = null,
        public ?int $minValue = null,
        public ?ChartViewWindowMode $viewWindowMode = null,
        public ?ChartViewWindow $viewWindow = null
    ) {
    }
}
