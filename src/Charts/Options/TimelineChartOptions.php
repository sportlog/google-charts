<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options;

use TimelineTrigger;

/**
 * Options for TimelineChart
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/timeline#Configuration_Options
 */
class TimelineChartOptions extends BaseOptions
{
    public function setAvoidOverlappingGridLines(bool $value): void
    {
        $this->setOption('avoidOverlappingGridLines', $value);
    }

    public function setBackgroundColor(string|BackgroundColor|null $value): void
    {
        $this->setOption('backgroundColor', $value);
    }

    public function setColors(?array $value): void
    {
        $this->setOption('colors', $value);
    }

    public function setEnableInteractivity(?bool $value): void
    {
        $this->setOption('enableInteractivity', $value);
    }

    public function setFontName(?string $value): void
    {
        $this->setOption('fontName', $value);
    }

    public function setFontSize(?int $value): void
    {
        $this->setOption('fontSize', $value);
    }

    public function setForceIFrame(?bool $value): void
    {
        $this->setOption('forceIFrame', $value);
    }

    public function setTimeline(?TimelineOptions $timelineOptions): void
    {
        $this->setOption('timeline', $timelineOptions);
    }

    public function setTooltip(?bool $isHtml, ?TimelineTrigger $trigger): void
    {
        $tooltip = [];
        if (!is_null($isHtml)) {
            $tooltip['isHtml'] = $isHtml;
        }
        if (!is_null($trigger)) {
            $tooltip['trigger'] = $isHtml;
        }
        $this->setOption('tooltip', $tooltip);
    }
}
