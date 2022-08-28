<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

use DateTimeInterface;
use InvalidArgumentException;

enum ColumnType: string
{
    case String = 'string';
    case Number = 'number';
    case Bool = 'boolean';
    case Date = 'date';
    case DateTime = 'datetime';
    case TimeOfDay = 'timeofday';

    /**
     * Infers the column type from the value type.
     *
     * @param mixed $value
     * @return self
     * @throws InvalidArgumentException Column type cannot be inferred.
     */
    public static function fromValue(mixed $value): self
    {
        $type = gettype($value);
        return match (true) {
            $type === 'boolean' => self::Bool,
            $type === 'string' => self::String,
            $type === 'integer' || $type === 'double' => self::Number,
            $type === 'array' && (count($value) === 3 || count($value) === 4) &&
                array_reduce($value, fn ($acc, $item) => $acc && is_int($item), true) => self::TimeOfDay,
            $value instanceof DateTimeInterface => self::DateTime,
            default => throw new InvalidArgumentException("cannot resolve ColumnType for {$type}")
        };
    }

    public function equalsValueType(mixed $value): bool
    {
        $columnType = self::fromValue($value);
        return $this === $columnType || ($this->isDate() && $columnType->isDate());
    }

    private function isDate(): bool
    {
        return $this === self::Date || $this === self::DateTime;
    }
}
