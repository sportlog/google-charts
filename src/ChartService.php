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
use Sportlog\GoogleCharts\Charts\Options\AreaChart\AreaChartOptions;
use Sportlog\GoogleCharts\Charts\Options\BarChart\BarChartOptions;
use Sportlog\GoogleCharts\Charts\Options\BubbleChart\BubbleChartOptions;
use Sportlog\GoogleCharts\Charts\Options\CandlestickChart\CandlestickChartOptions;
use Sportlog\GoogleCharts\Charts\Options\ColumnChart\ColumnChartOptions;
use Sportlog\GoogleCharts\Charts\Options\ComboChart\ComboChartOptions;
use Sportlog\GoogleCharts\Charts\Options\GanttChart\GanttChartOptions;
use Sportlog\GoogleCharts\Charts\Options\GaugeChart\GaugeChartOptions;
use Sportlog\GoogleCharts\Charts\Options\GeoChart\GeoChartOptions;
use Sportlog\GoogleCharts\Charts\Options\LineChart\LineChartOptions;
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartOptions;
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineChartOptions;
use Sportlog\GoogleCharts\Charts\{Base\ChartDesign, Base\GoogleChart, AreaChart, BarChart, BubbleChart, CandlestickChart, ColumnChart, ComboChart, GanttChart, GaugeChart, GeoChart, LineChart, PieChart, TimelineChart};

/**
 * Service for creating and loading charts
 */
class ChartService
{
    private const GOOGLE_CHART_LOADER_SCRIPT = 'https://www.gstatic.com/charts/loader.js';
    private const CHART_TEMPLATE_SCRIPT = '/js/google_chart.js';
    private const CHART_LOAD_SCRIPT = 'GoogleCharts.loadCharts(%s);';
    private const CHART_DIV = '<div id="%s"></div>';
    private const SCRIPT_TAG = '<script%s>%s</script>';

    /**
     * List of created charts
     *
     * @var GoogleChart[]
     */
    private array $charts = [];
    /**
     * Indicates if the javascript files haven been loaded.
     *
     * @var boolean
     */
    private bool $loaded = false;

    /**
     * Creates a new chart service instance
     *
     * @param ScriptNonceProviderInterface|null $scriptNonceProvider 
     */
    public function __construct(private readonly ?ScriptNonceProviderInterface $scriptNonceProvider = null)
    {
    }

    /**
     * Creates a new Area chart.
     *
     * @param string $id
     * @param AreaChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createAreaChart(string $id, AreaChartOptions $options = new AreaChartOptions()): AreaChart
    {
        $chart = new AreaChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Bar chart.
     *
     * @param string $id
     * @param BarChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createBarChart(string $id, BarChartOptions $options = new BarChartOptions(), ChartDesign $design = ChartDesign::Classic): BarChart
    {
        $chart = new BarChart($id, $options, $design);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Bubble chart.
     *
     * @param string $id
     * @param BubbleChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createBubbleChart(string $id, BubbleChartOptions $options = new BubbleChartOptions()): BubbleChart
    {
        $chart = new BubbleChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new CandlestickChart chart.
     *
     * @param string $id
     * @param CandlestickChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createCandlestickChart(string $id, CandlestickChartOptions $options = new CandlestickChartOptions()): CandlestickChart
    {
        $chart = new CandlestickChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Column chart.
     *
     * @param string $id
     * @param ColumnChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createColumnChart(string $id, ColumnChartOptions $options = new ColumnChartOptions(), ChartDesign $design = ChartDesign::Classic): ColumnChart
    {
        $chart = new ColumnChart($id, $options, $design);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Combo chart.
     *
     * @param string $id
     * @param ComboChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createComboChart(string $id, ComboChartOptions $options = new ComboChartOptions()): ComboChart
    {
        $chart = new ComboChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Gantt chart.
     *
     * @param string $id
     * @param GanttChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createGanttChart(string $id, GanttChartOptions $options = new GanttChartOptions()): GanttChart
    {
        $chart = new GanttChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Gauge chart.
     *
     * @param string $id
     * @param GaugeChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createGaugeChart(string $id, GaugeChartOptions $options = new GaugeChartOptions()): GaugeChart
    {
        $chart = new GaugeChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Geo chart.
     *
     * @param string $id
     * @param GeoChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createGeoChart(string $id, GeoChartOptions $options = new GeoChartOptions()): GeoChart
    {
        $chart = new GeoChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Line chart.
     *
     * @param string $id
     * @param LineChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createLineChart(string $id, LineChartOptions $options = new LineChartOptions(), ChartDesign $design = ChartDesign::Classic): LineChart
    {
        $chart = new LineChart($id, $options, $design);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Pie chart.
     *
     * @param string $id
     * @param PieChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createPieChart(string $id, PieChartOptions $options = new PieChartOptions()): PieChart
    {
        $chart = new PieChart($id, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Timeline chart.
     *
     * @param string $id
     * @param TimelineChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createTimelineChart(string $id, TimelineChartOptions $options = new TimelineChartOptions()): TimelineChart
    {
        $chart = new TimelineChart($id, $options);
        $this->addChart($chart);
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
            $this->getScriptTag(self::GOOGLE_CHART_LOADER_SCRIPT),
            $this->getScriptTag($chartTemplateJs, false),
            $this->getScriptTag($chartJs, false)
        ];
    }

    private function addChart(GoogleChart $chart): GoogleChart
    {
        $id = $chart->getId();
        if (isset($this->charts[$id])) {
            throw new InvalidArgumentException("A chart with id '{$id}' already exists");
        }

        $this->charts[$id] = $chart;
        return $chart;
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
