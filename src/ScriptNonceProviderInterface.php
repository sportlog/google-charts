<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts;

/**
 * Service to provide nonces for securing script-src tags
 * for js files.
 */
interface ScriptNonceProviderInterface {
    /**
     * Gets a new nonce to load
     */
    public function storeNonce(): string;
}