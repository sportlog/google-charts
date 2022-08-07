<?php

/**
 * Google chart column types
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts\Charts\Base;

enum ColumnRole: string
{
    case Annotation = 'annotation';
    case AnnotationText = 'annotationText';
    case Certainty = 'certainty';
    case Emphasis = 'emphasis';
    case Interval = 'interval';
    case Scope = 'scope';
    case Style = 'style';
    case Tooltip = 'tooltip';
}
