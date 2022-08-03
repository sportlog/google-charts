<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Test;

use PHPUnit\Framework\{Assert, TestCase};
use Sportlog\GoogleCharts\Charts\Base\{Column, ColumnType, DataTable, Row};
use Stringable;

final class DataTableTest extends TestCase
{
    public function testStringableSerialization(): void {
        $data = new DataTable();
        $data->addColumn(new Column(ColumnType::String, 'Column 1'));
        $data->addColumn(new Column(ColumnType::String, 'Column 2'));

        $donut = new class('donut') implements Stringable {
            public function __construct(private readonly string $name)
            {
            }

            public function __toString(): string
            {
                return $this->name;
            }
        };

        $expectedJson = <<<EOL
        {
            "cols": [
                {
                    "type": "string",
                    "label": "Column 1"
                },
                {
                    "type": "string",
                    "label": "Column 2"
                }
            ],
            "rows": [
                {
                    "c": [
                        {
                            "v": "Hamburger"
                        },
                        {
                            "v": "donut"
                        }
                    ]
                }
            ]
        }
        EOL;


        $data->addRow([
            'Hamburger',
            $donut
        ]);

        $json = json_encode($data, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }
}