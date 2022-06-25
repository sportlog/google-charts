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
use Sportlog\GoogleCharts\Row;

final class RowTest extends TestCase
{
    public function testJsonSerialization(): void
    {
        $expectedJson = <<<EOL
        {
            "c": [
                {
                    "v": 12
                },
                {
                    "v": "some string"
                },
                {
                    "v": "Date(2022, 4, 5, 0, 0, 0)"
                }
            ]
        }
        EOL;

        $row = new Row([12, 'some string', new DateTime('2022-05-05')]);
        $json = json_encode($row, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }

    public function testJsonSerializationFormatted(): void
    {
        $expectedJson = <<<EOL
        {
            "c": [
                {
                    "v": 12,
                    "f": "12.0"
                },
                {
                    "v": "some string",
                    "f": "Some String"
                },
                {
                    "v": "Date(2022, 4, 5, 0, 0, 0)",
                    "f": "05.05.2022"
                }
            ]
        }
        EOL;

        $row = new Row([12, 'some string', new DateTime('2022-05-05')], ['12.0', 'Some String', '05.05.2022']);
        $json = json_encode($row, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }
}
