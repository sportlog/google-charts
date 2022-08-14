<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\WordTreeChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * Wordtree options
 */
class WordTreeOptions extends NotNullSerializer
{
    public function __construct(
        public ?WordTreeFormat $format = null,
        public ?string $sentenceSeparator = null,
        public ?string $type = null,
        public ?string $word = null,
        public ?string $wordSeparator = null
    ) {
    }
}
