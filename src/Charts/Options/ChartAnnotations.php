<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

use InvalidArgumentException;

class ChartAnnotations
{
    public function __construct(
        public readonly ?ChartBoxStyle $boxStyle = null,
        public readonly ?ChartStemAndStyle $datum = null,
        public readonly ?ChartStemAndStyle $domain = null,
        public readonly ?bool $highContrast = null,
        public readonly ?ChartStem $stem = null,
        public readonly ?ChartAnnotationStyle $style = null,
        public readonly ?ChartTextStyle $textStyle = null,
        public readonly ?float $areaOpacity = null,
        public readonly ?ChartAxisTitlePosition $axisTitlesPosition = null,
        public readonly ?ChartBackgroundColor $backgroundColor = null
    ) {
        if (!is_null($areaOpacity) && ($areaOpacity < 0 || $areaOpacity > 1)) {
            throw new InvalidArgumentException('areaOpacity must be between 0.0 and 1.0');
        }
    }
}
