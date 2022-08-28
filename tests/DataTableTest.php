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

    public function testCreateFromArrayWhereFirstRowIsData(): void
    {
        $data = DataTable::fromArray([
            ['Mon', 28, 28, 38, 38],
            ['Tue', 38, 38, 55, 55],
            ['Wed', 55, 55, 77, 77],
            ['Thu', 77, 77, 66, 66],
            ['Fri', 66, 66, 22, 22]
        ], true);

        $expectedJson = <<<EOL
        {
            "cols": [
                {
                    "type": "string"
                },
                {
                    "type": "number"
                },
                {
                    "type": "number"
                },
                {
                    "type": "number"
                },
                {
                    "type": "number"
                }
            ],
            "rows": [
                {
                    "c": [
                        {
                            "v": "Mon"
                        },
                        {
                            "v": 28
                        },
                        {
                            "v": 28
                        },
                        {
                            "v": 38
                        },
                        {
                            "v": 38
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Tue"
                        },
                        {
                            "v": 38
                        },
                        {
                            "v": 38
                        },
                        {
                            "v": 55
                        },
                        {
                            "v": 55
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Wed"
                        },
                        {
                            "v": 55
                        },
                        {
                            "v": 55
                        },
                        {
                            "v": 77
                        },
                        {
                            "v": 77
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Thu"
                        },
                        {
                            "v": 77
                        },
                        {
                            "v": 77
                        },
                        {
                            "v": 66
                        },
                        {
                            "v": 66
                        }
                    ]
                },
                {
                    "c": [
                        {
                            "v": "Fri"
                        },
                        {
                            "v": 66
                        },
                        {
                            "v": 66
                        },
                        {
                            "v": 22
                        },
                        {
                            "v": 22
                        }
                    ]
                }
            ]
        }
        EOL;

        $json = json_encode($data, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedJson, $json);
    }

    public function testCreateFromArrayWihEmptyInputThrows(): void {
        $this->expectException(InvalidArgumentException::class);
        DataTable::fromArray([]);
    }

    public function testCreateFromArrayWithLabelsOnlyThrows(): void {
        $this->expectException(InvalidArgumentException::class);
        DataTable::fromArray([['Col1', 'Col2']]);
    }
}
