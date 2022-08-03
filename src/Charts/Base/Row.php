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
use JsonSerializable;
use Stringable;

/**
 * Row
 */
class Row implements JsonSerializable
{
    /**
     * Creates a new row
     *
     * @param array $values The row values
     * @param array $formatted The formatted values
     */
    public function __construct(private array $values, private array $formatted = [])
    {
    }

    /**
     * Serialize row values
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return ['c' => array_map(
            fn ($value, $formatted) => $this->serializeValue($value, $formatted),
            $this->values,
            $this->formatted
        )];
    }

    private function serializeValue(mixed $value, mixed $formatted): mixed
    {
        $result = [];
        $result['v'] = $this->getValue($value);

        if (!is_null($formatted)) {
            $result['f'] = $formatted;
        }
        return $result;
    }

    private function getValue(mixed $value): mixed
    {
        if ($value instanceof DateTimeInterface) {
            return $this->getDateString($value);
        }
        if ($value instanceof Stringable) {
            return $value->__toString();
        }
        return $value;
    }

    /**
     * Convert Date to string
     * https://developers.google.com/chart/interactive/docs/datesandtimes?hl=en#datestring
     *
     * @param DateTimeInterface $value
     * @return mixed
     */
    private function getDateString(DateTimeInterface $value): mixed
    {
        $timestamp = $value->getTimestamp();
        return sprintf(
            'Date(%d, %d, %d, %d, %d, %d)',
            date('Y', $timestamp),
            (int)date('n', $timestamp) - 1, // JS-Date month starts at zero
            date('j', $timestamp),
            date('H', $timestamp),
            date('i', $timestamp),
            date('s', $timestamp)
        );
    }
}
