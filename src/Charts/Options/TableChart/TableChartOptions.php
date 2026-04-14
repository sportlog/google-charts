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
    /**
     * ctor
     * 
     * @param bool|null $allowHtml
     * @param bool|null $alternatingRowStyle
     * @param ArrayObject<string,string>|null $cssClassNames
     * @param int|null $firstRowNumber
     * @param int|null $frozenColumns
     * @param TablePaging|null $page
     * @param int|null $pageSize
     * @param TablePagingButtons|int|null $pagingButtons
     * @param bool|null $rtlTable
     * @param int|null $scrollLeftStartPosition
     * @param bool|null $showRowNumber
     * @param TableSorting|null $sort
     * @param bool|null $sortAscending
     * @param int|null $sortColumn
     * @param int|null $startPage
     */
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
    ) {}
}
