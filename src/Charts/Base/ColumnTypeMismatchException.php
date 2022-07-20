<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

use Exception;

class ColumnTypeMismatchException extends Exception {
    public function __construct(int $index, ColumnType $columnType)
    {
        parent::__construct("Value with index {$index} does not match the column type. Expected columnType is {$columnType->value}");
    }
}