<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Test;

use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sportlog\GoogleCharts\Charts\Base\ColumnType;

final class ColumnTypeTest extends TestCase
{
    public function testColumnTypeFromValue(): void
    {
        $this->assertEquals(ColumnType::Bool, ColumnType::fromValue(true));
        $this->assertEquals(ColumnType::Bool, ColumnType::fromValue(false));
        $this->assertEquals(ColumnType::String, ColumnType::fromValue('test'));
        $this->assertEquals(ColumnType::Number, ColumnType::fromValue(1));
        $this->assertEquals(ColumnType::Number, ColumnType::fromValue(1.234));
        $this->assertEquals(ColumnType::TimeOfDay, ColumnType::fromValue([1, 2, 3, 4]));
        $this->assertEquals(ColumnType::TimeOfDay, ColumnType::fromValue([1, 2, 3]));
    }

    public function testColumnTypeFromValueTooShortTimeOfDayThrows(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->assertEquals(ColumnType::TimeOfDay, ColumnType::fromValue([1, 2]));
    }

    public function testColumnTypeFromValueFloatTimeOfDayThrows(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->assertEquals(ColumnType::TimeOfDay, ColumnType::fromValue([1, 2, 3.4]));
    }

    public function testColumnTypeEquality(): void
    {
        $this->assertTrue(ColumnType::DateTime->equalsValueType(new DateTime()));
        $this->assertTrue(ColumnType::Date->equalsValueType(new DateTime()));

        $this->assertFalse(ColumnType::String->equalsValueType(new DateTime()));
    }
}
