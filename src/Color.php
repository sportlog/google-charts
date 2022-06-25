<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts;

/**
 * Google default colors.
 */
enum Color: string
{
    case C1 = '#3366cc';
    case C2 = '#dc3912';
    case C3 = '#ff9900';
    case C4 = '#109618';
    case C5 = '#990099';
    case C6 = '#0099c6';
    case C7 = '#dd4477';
    case C8 = '#66aa00';
    case C9 = '#b82e2e';
    case C10 = '#316395';
    case C11 = '#994499';
    case C12 = '#22aa99';
    case C13 = '#aaaa11';
    case C14 = '#6633cc';
    case C15 = '#e67300';
    case C16 = '#8b0707';
    case C17 = '#651067';
    case C18 = '#329262';
    case C19 = '#5574a6';
    case C20 = '#3b3eac';
    case C21 = '#b77322';
    case C22 = '#16d620';
    case C23 = '#b91383';
    case C24 = '#f4359e';
    case C25 = '#9c5935';
    case C26 = '#a9c413';
    case C27 = '#2a778d';
    case C28 = '#668d1c';
    case C29 = '#bea413';
    case C30 = '#0c5922';
    case C31 = '#743411';

    /**
     * Gets a color from index
     *
     * @param integer $index
     * @return self
     */
    public static function fromIndex(int $index): self {
        $cases = self::cases();
        return $cases[$index % count($cases)];
    }
}
