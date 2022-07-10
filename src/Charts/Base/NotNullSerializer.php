<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

use ArrayObject;
use JsonSerializable;

/**
 * Json Seralizer which omits Null values (properties)
 */
class NotNullSerializer implements JsonSerializable {
    public function jsonSerialize(): mixed {
        // Filter null values
        return new ArrayObject(array_filter(get_object_vars($this), fn ($item) => !is_null($item)));
    }
}