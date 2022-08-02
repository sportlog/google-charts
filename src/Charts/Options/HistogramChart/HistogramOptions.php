<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\HistogramChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * HistogramOptions
 */
class HistogramOptions extends NotNullSerializer
{
    public function __construct(
        public ?int $bucketSize = null,
        public ?bool $hideBucketItems = null,
        public ?int $lastBucketPercentile = null,
        public ?int $minValue = null,
        public ?int $maxValue = null,
        public ?string $numBucketsRule = null,
    ) {
    }
}
