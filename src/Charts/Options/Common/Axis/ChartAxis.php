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
        public readonly ?float $baseline = null,
        public readonly ?string $baselineColor = null,
        public readonly ?int $direction = null,
        public readonly ?string $format = null,
        public readonly ?ChartGridlines $gridlines = null,
        public readonly ?ChartGridlines $minorGridlines = null,
        public readonly ?bool $logScale = null,
        public readonly ?ChartScaleType $scaleType = null,
        public readonly ?ChartAxisTitlePosition $textPosition = null,
        public readonly ?ChartTextStyle $textStyle = null,
        public readonly ?array $ticks = null,
        public readonly ?string $title = null,
        public readonly ?ChartTextStyle $titleTextStyle = null,
        public readonly ?bool $allowContainerBoundaryTextCutoff = null,
        public readonly ?bool $slantedText = null,
        public readonly ?int $slantedTextAngle = null,
        public readonly ?int $maxAlternation = null,
        public readonly ?int $maxTextLines = null,
        public readonly ?int $minTextSpacing = null,
        public readonly ?int $showTextEvery = null,
        public readonly ?int $maxValue = null,
        public readonly ?int $minValue = null,
        public readonly ?ChartViewWindowMode $viewWindowMode = null,
        public readonly ?ChartViewWindow $viewWindow = null
    )
    {
        
    }
}