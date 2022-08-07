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
use PHPUnit\Framework\TestCase;
use Sportlog\GoogleCharts\Charts\Base\{Column, ColumnRole, ColumnType};

final class ColumnTest extends TestCase
{
    public function testJsonSerialization(): void
    {
        $expectedJson = <<<EOL
        {
            "type": "date",
            "label": "Test"
        }
        EOL;

        $row = new Column(ColumnType::Date, 'Test');
        $json = json_encode($row, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }

    public function testJsonSerializationFull(): void
    {
        $expectedJson = <<<EOL
        {
            "type": "string",
            "label": "Some label",
            "id": "#123",
            "role": "style",
            "pattern": "pattern"
        }
        EOL;

        $row = new Column(ColumnType::String, 'Some label', '#123', ColumnRole::Style, 'pattern');
        $json = json_encode($row, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }
}
