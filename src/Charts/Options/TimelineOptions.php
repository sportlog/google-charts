<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

use JsonSerializable;

class TimelineOptions implements JsonSerializable
{
    public function __construct(
        private readonly ?bool $colorByRowLabel = null,
        private readonly ?bool $groupByRowLabel = null,
        private readonly ?LabelStyle $rowLabelStyle = null,
        private readonly ?bool $showBarLabels = null,
        private readonly ?bool $showRowLabels = null,
        private readonly ?string $singleColor  = null
    ) {
    }

    /**
     * Get json serializable
     */
    public function jsonSerialize(): mixed
    {
        $options = [];
        if (!is_null($this->colorByRowLabel)) {
            $options['colorByRowLabel'] = $this->colorByRowLabel;
        }
        if (!is_null($this->groupByRowLabel)) {
            $options['groupByRowLabel'] = $this->groupByRowLabel;
        }
        if (!is_null($this->rowLabelStyle)) {
            $options['rowLabelStyle'] = $this->rowLabelStyle;
        }
        if (!is_null($this->showBarLabels)) {
            $options['showBarLabels'] = $this->showBarLabels;
        }
        if (!is_null($this->showRowLabels)) {
            $options['showRowLabels'] = $this->showRowLabels;
        }
        if (!is_null($this->singleColor)) {
            $options['singleColor'] = $this->singleColor;
        }

        return $options;
    }
}
