<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\Modules\Charts;

/**
 * Abstract base class for charts.
 */
interface ScriptNonceProviderInterface {
    /**
     * Gets a new nonce to load
     */
    public function storeNonce(): string;
}