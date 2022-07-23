<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\Common;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

class ChartSeriesOptions extends NotNullSerializer {
    public function __construct(
        public readonly ?ChartAnnotations $annotations = null,
        public readonly ?float $areaOpacity = null,
        public readonly ?string $color = null,
        public readonly ?string $labelInLegend = null,
        public readonly ?array $lineDashStyle = null,
        public readonly ?float $lineWidth = null,
        public readonly ?ChartPointShape $pointShape = null,
        public readonly ?float $pointSize = null,
        public readonly ?bool $pointsVisible = null,
        public readonly ?float $targetAxisIndex = null,
        public readonly ?bool $visibleInLegend = null
    )
    {
    }
}