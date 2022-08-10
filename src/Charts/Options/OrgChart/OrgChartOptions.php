<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Options\OrgChart;

use Sportlog\GoogleCharts\Charts\Base\NotNullSerializer;

/**
 * OrgChart options.
 * 
 * @see https://developers.google.com/chart/interactive/docs/gallery/orgchart#configuration-options
 */
class OrgChartOptions extends NotNullSerializer
{
    public ?bool $allowCollapse = null;
    public ?bool $allowHtml = null;
    public ?bool $compactRows = null;
    public ?string $nodeClass = null;
    public ?string $pieSliceBorderColor = null;
    public ?string $selectedNodeClass = null;
    public ?OrgChartSize $size = null;
}
