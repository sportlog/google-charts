<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

class Column extends NotNullSerializer
{
    /**
     * Creates a new tooltip column.
     *
     * @return self
     */
    public static function createTooltip(): self {
        return new self(ColumnType::String, role: 'tooltip');
    }

    public function __construct(
        public readonly ColumnType $type,
        public readonly  ?string $label = null,
        public readonly  ?string $id = null,
        public readonly  ?string $role = null,
        public readonly  ?string $pattern = null
    ) {
    }
}
