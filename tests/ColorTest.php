<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Test;

use PHPUnit\Framework\TestCase;
use Sportlog\GoogleCharts\Charts\Base\ChartDefaultColor;

final class ColorTest extends TestCase
{
    public function testColorFromIndex(): void
    {
        $color = ChartDefaultColor::fromIndex(2);
        $this->assertEquals(ChartDefaultColor::C3, $color);

        // There are 31 colors; so an overflow in the index must start from first index
        $color = ChartDefaultColor::fromIndex(33);  // 33 - 31 = 2
        $this->assertEquals(ChartDefaultColor::C3, $color);
    }
}
