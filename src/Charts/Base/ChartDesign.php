<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

/**
 * Google chart design.
 */
enum ChartDesign: string {
    /**
     * Classic chart
     */
    case Classic = 'classic';
    /**
     * Chart in material design (using SVG)
     */
    case Material = 'material';
}