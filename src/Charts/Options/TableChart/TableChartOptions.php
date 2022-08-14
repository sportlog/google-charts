<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\TableChart;

use ArrayObject;
use Sportlog\GoogleCharts\Charts\Options\Common\ChartSizeable;

class TableChartOptions extends ChartSizeable
{
    public function __construct(

        public ?bool $allowHtml = null,
        public ?bool $alternatingRowStyle = null,
        public ?ArrayObject $cssClassNames = null,
        public ?int $firstRowNumber = null,
        public ?int $frozenColumns = null,
        public ?TablePaging $page = null,
        public ?int $pageSize = null,
        public TablePagingButtons|int|null $pagingButtons = null,
        public ?bool $rtlTable = null,
        public ?int $scrollLeftStartPosition = null,
        public ?bool $showRowNumber = null,
        public ?TableSorting $sort = null,
        public ?bool $sortAscending = null,
        public ?int $sortColumn = null,
        public ?int $startPage = null,
    ) {
    }
}
