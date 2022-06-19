<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\Modules\Charts;

enum ColumnType: string {
    case String = 'string';
    case Number = 'number';
    case Bool = 'boolean';
    case Date = 'date';
    case DateTime = 'datetime';
    case TimeOfDay = 'timeofday';
}