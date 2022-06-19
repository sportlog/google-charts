<?php

/**
 * Sportlog (https://sportlog.at)
 *
 * @link https://sportlog.at
 * @license MIT License
 */

declare(strict_types=1);

namespace Sportlog\GoogleCharts;

use Exception;
use InvalidArgumentException;

/**
 * Service for creating and loading charts
 */
class ChartService
{
    private const GOOGLE_CHART_LODER_SCRIPT = 'https://www.gstatic.com/charts/loader.js';
    private const CHART_TEMPLATE_SCRIPT = '/js/google_chart.js';
    private const CHART_LOAD_SCRIPT = 'GoogleCharts.loadCharts(%s);';
    private const CHART_DIV = '<div id="%s"></div>';
    private const SCRIPT_TAG = '<script%s">%s</script>';

    private array $charts = [];
    private bool $loaded = false;

    public function __construct(private readonly ?ScriptNonceProviderInterface $scriptNonceProvider)
    {
    }

    /**
     * Creates a new Google chart.
     *
     * @param string $id
     * @param ChartType $charttype
     * @param array $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     * @return GoogleChart
     */
    public function createGoogleChart(string $id, ChartType $charttype, array $options = []): GoogleChart
    {
        if (isset($this->charts[$id])) {
            throw new InvalidArgumentException("A chart with id '{$id}' already exists; ids must be unique");
        }

        $chart = new GoogleChart($id, $charttype, $options);
        $this->charts[$id] = $chart;

        return $chart;
    }

    /**
     * Renders the chart with the given id.
     * Includes script tags to load the required javascript files, if this
     * is the first call to this function.
     *
     * @param string $id
     * @throws InvalidArgumentException No chart with the given id exists.
     * @return string
     */
    public function render(string $id): string
    {
        if (!isset($this->charts[$id])) {
            throw new InvalidArgumentException("No chart with id '{$id}' found");
        }

        $buffer = $this->load();
        $buffer[] = sprintf(self::CHART_DIV, $id);

        return implode($buffer);
    }

    /**
     * Get array of script tags to load the required JS files.
     * This method is automatically called on chart rendering, so
     * usually you don't need to call it manually.
     *
     * @return array
     */
    public function load(): array
    {
        if ($this->loaded) {
            return [];
        }

        $chartTemplateJsFile = realpath(__DIR__ . self::CHART_TEMPLATE_SCRIPT);
        $chartTemplateJs = file_get_contents($chartTemplateJsFile);

        // Charts is an associative array which would get encoded as on object.
        // So only take the values to encode it as an array.
        $serializedData = json_encode(array_values($this->charts));
        if ($serializedData === false) {
            throw new Exception('failed to encode chart data to JSON');
        }
        $chartJs = sprintf(self::CHART_LOAD_SCRIPT, $serializedData);

        $this->loaded = true;

        return [
            $this->getScriptTag(self::GOOGLE_CHART_LODER_SCRIPT),
            $this->getScriptTag($chartTemplateJs, false),
            $this->getScriptTag($chartJs, false)
        ];
    }

    private function getScriptTag(string $fileOrContent, bool $isFile = true): string
    {
        $content = '';
        $attrs = '';
        if (!is_null($this->scriptNonceProvider)) {
            $attrs .= " nonce=\"{$this->scriptNonceProvider->storeNonce()}\"";
        }
        if ($isFile) {
            $attrs .= " src=\"{$fileOrContent}\"";
        }
        else {
            $content = $fileOrContent;
        }

        return sprintf(self::SCRIPT_TAG, $attrs, $content);
    }
}
