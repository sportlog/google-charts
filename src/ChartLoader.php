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
use Sportlog\GoogleCharts\Charts\Base\GoogleChart;

/**
 * Loads the charts by adding script tags for
 * - the Google-Charts Library
 * - the JSON serialized charts
 * - the GoogleCharts Wrapper which draws the charts
 */
class ChartLoader
{
    private const GOOGLE_CHART_LOADER_SCRIPT = 'https://www.gstatic.com/charts/loader.js';
    private const CHART_TEMPLATE_SCRIPT = '/js/google_chart.js';
    private const CHART_LOAD_SCRIPT = 'GoogleCharts.loadCharts(%s);';
    private const SCRIPT_TAG = '<script%s>%s</script>';
    /**
     * Indicates if the javascript files haven been loaded.
     *
     * @var boolean
     */
    private bool $mainScripsLoaded = false;
    /**
     * Associative array
     * Key is the id of the chart
     *
     * @var array
     */
    private array $chartLoaded = [];

    /**
     * Creates a new chart loader instance
     *
     * @param ScriptNonceProviderInterface|null $scriptNonceProvider 
     */
    public function __construct(private readonly ?ScriptNonceProviderInterface $scriptNonceProvider = null)
    {
    }


    /**
     * Get array of script tags to load the required JS files.
     * This method is automatically called on chart rendering, so
     * usually you don't need to call it manually.
     *
     * @param GoogleChart[] $charts
     * @param ChartSettings|null $chartSettings
     * @return array
     */
    public function load(array $charts, ?ChartSettings $chartSettings = null): array
    {
        $scripts = [];

        if (!$this->mainScripsLoaded) {
            $chartTemplateJsFile = realpath(__DIR__ . self::CHART_TEMPLATE_SCRIPT);
            $chartTemplateJs = file_get_contents($chartTemplateJsFile);

            $scripts[] = $this->getScriptTag(self::GOOGLE_CHART_LOADER_SCRIPT);
            $scripts[] = $this->getScriptTag($chartTemplateJs, false);

            $this->mainScripsLoaded = true;
        }

        $chartsToLoad = [];
        foreach ($charts as $chart) {
            if (!isset($this->chartLoaded[$chart->getId()])) {
                $this->chartLoaded[$chart->getId()] = true;
            }

            $chartsToLoad[] = $chart;
        }

        if (count($chartsToLoad) > 0) {
            // Charts is an associative array which would get encoded as on object.
            // So only take the values to encode it as an array.
            $data = ['charts' => array_values($chartsToLoad)];
            if (!is_null($chartSettings)) {
                $data['settings'] = $chartSettings;
            }

            $serializedData = json_encode($data);
            if ($serializedData === false) {
                throw new Exception('failed to encode chart data to JSON');
            }
            $chartJs = sprintf(self::CHART_LOAD_SCRIPT, $serializedData);
            $scripts[] = $this->getScriptTag($chartJs, false);
        }

        return $scripts;
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
        } else {
            $content = $fileOrContent;
        }

        return sprintf(self::SCRIPT_TAG, $attrs, $content);
    }
}
