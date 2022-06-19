<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\Modules\Charts;

use JsonSerializable;

class Column implements JsonSerializable
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
        private ColumnType $type,
        private ?string $label = null,
        private ?string $id = null,
        private ?string $role = null,
        private ?string $pattern = null
    ) {
    }

    public function jsonSerialize(): mixed {
        $result = [
            'type' => $this->type
        ];
        if (!is_null($this->id)) {
            $result['id'] = $this->id;
        }
        if (!is_null($this->label)) {
            $result['label'] = $this->label;
        }
        if (!is_null($this->pattern)) {
            $result['pattern'] = $this->pattern;
        }
        if (!is_null($this->role)) {
            $result['role'] = $this->role;
        }

        return $result;
    }
}
