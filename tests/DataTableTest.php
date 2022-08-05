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
use PHPUnit\Framework\{Assert, TestCase};
use Sportlog\GoogleCharts\Charts\Base\{Column, ColumnType, DataTable, Row};
use Stringable;

final class DataTableTest extends TestCase
{
    public function testStringableSerialization(): void
    {
        $data = new DataTable();
        $data->addColumn(new Column(ColumnType::String, 'Column 1'));
        $data->addColumn(new Column(ColumnType::String, 'Column 2'));

        $donut = new class('donut') implements Stringable
        {
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

    public function testThrowErrorForWrongType(): void
    {
        $data = new DataTable();
        $data->addColumn(new Column(ColumnType::String, 'Column 1'));
        $data->addColumn(new Column(ColumnType::Number, 'Column 2'));

        $this->expectExceptionObject(new InvalidArgumentException("Value with index 1 does not match the column type. Expected columnType is number"));
        $data->addRow(['Test', new DateTime()]);
    }

    public function testCreateFromArrayWithInvalidInput(): void
    {
        $this->expectException(InvalidArgumentException::class);
        DataTable::fromArray([
            ['Task', 'Hours per Day'],
            ['Work',     '11'],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ]);
    }

    public function testCreateFromArray(): void
    {
        $data = DataTable::fromArray([
            ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ]);

        $expectedJson = <<<EOL
        {
            "cols": [
                {
                    "type": "string",
                    "label": "Task"
                },
                {
                    "type": "number",
                    "label": "Hours per Day"
                }
            ],
            "rows": [
                {
                    "c": [
                        {
                            "v": "Work"
                        },
                        {
                            "v": 11
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Eat"
                        },
                        {
                            "v": 2
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Commute"
                        },
                        {
                            "v": 2
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Watch TV"
                        },
                        {
                            "v": 2
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Sleep"
                        },
                        {
                            "v": 7
                        }
                    ]
                }
            ]
        }
        EOL;

        $json = json_encode($data, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }
}
