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
use Sportlog\GoogleCharts\Charts\Options\HistogramChart\HistogramChartOptions;
use Sportlog\GoogleCharts\Charts\Options\LineChart\LineChartOptions;
use Sportlog\GoogleCharts\Charts\Options\Map\MapOptions;
use Sportlog\GoogleCharts\Charts\Options\OrgChart\OrgChartOptions;
use Sportlog\GoogleCharts\Charts\Options\PieChart\PieChartOptions;
use Sportlog\GoogleCharts\Charts\Options\ScatterChart\ScatterChartOptions;
use Sportlog\GoogleCharts\Charts\Options\SteppedAreaChart\SteppedAreaChartOptions;
use Sportlog\GoogleCharts\Charts\Options\TableChart\TableChartOptions;
use Sportlog\GoogleCharts\Charts\Options\TimelineChart\TimelineChartOptions;
use Sportlog\GoogleCharts\Charts\Options\WordTreeChart\WordTreeChartOptions;
use Sportlog\GoogleCharts\Charts\{Base\ChartDesign, Base\DataTable, Base\GoogleChart, AreaChart, BarChart, BubbleChart, CandlestickChart, ColumnChart, ComboChart, GanttChart, GaugeChart, GeoChart, HistogramChart, LineChart, Map, OrgChart, PieChart, ScatterChart, SteppedAreaChart, TableChart, TimelineChart, WordTreeChart};

/**
 * Service for creating and loading charts
 */
class ChartService
{
    private const CHART_DIV = '<div id="%s"></div>';

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
    private readonly ChartLoader $chartLoader;

    /**
     * Creates a new chart service instance
     *
     * @param ChartSettings|null $chartSettings 
     * @param ScriptNonceProviderInterface|null $scriptNonceProvider 
     */
    public function __construct(
        private readonly ?ChartSettings $chartSettings = null,
        ?ScriptNonceProviderInterface $scriptNonceProvider = null
    ) {
        $this->chartLoader = new ChartLoader($scriptNonceProvider);
    }

    /**
     * Creates a new Area chart.
     *
     * @param string $id
     * @param AreaChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createAreaChart(string $id, DataTable $data, AreaChartOptions $options = new AreaChartOptions()): AreaChart
    {
        $chart = new AreaChart($id, $data, $options);
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
    public function createBarChart(string $id, DataTable $data, BarChartOptions $options = new BarChartOptions(), ChartDesign $design = ChartDesign::Classic): BarChart
    {
        $chart = new BarChart($id, $data, $options, $design);
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
    public function createBubbleChart(string $id, DataTable $data, BubbleChartOptions $options = new BubbleChartOptions()): BubbleChart
    {
        $chart = new BubbleChart($id, $data, $options);
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
    public function createCandlestickChart(string $id, DataTable $data, CandlestickChartOptions $options = new CandlestickChartOptions()): CandlestickChart
    {
        $chart = new CandlestickChart($id, $data, $options);
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
    public function createColumnChart(string $id, DataTable $data, ColumnChartOptions $options = new ColumnChartOptions(), ChartDesign $design = ChartDesign::Classic): ColumnChart
    {
        $chart = new ColumnChart($id, $data, $options, $design);
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
    public function createComboChart(string $id, DataTable $data, ComboChartOptions $options = new ComboChartOptions()): ComboChart
    {
        $chart = new ComboChart($id, $data, $options);
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
    public function createGanttChart(string $id, DataTable $data, GanttChartOptions $options = new GanttChartOptions()): GanttChart
    {
        $chart = new GanttChart($id, $data, $options);
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
    public function createGaugeChart(string $id, DataTable $data, GaugeChartOptions $options = new GaugeChartOptions()): GaugeChart
    {
        $chart = new GaugeChart($id, $data, $options);
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
    public function createGeoChart(string $id, DataTable $data, GeoChartOptions $options = new GeoChartOptions()): GeoChart
    {
        $chart = new GeoChart($id, $data, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Histogram chart.
     *
     * @param string $id
     * @param HistogramChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createHistogramChart(string $id, DataTable $data, HistogramChartOptions $options = new HistogramChartOptions()): HistogramChart
    {
        $chart = new HistogramChart($id, $data, $options);
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
    public function createLineChart(string $id, DataTable $data, LineChartOptions $options = new LineChartOptions(), ChartDesign $design = ChartDesign::Classic): LineChart
    {
        $chart = new LineChart($id, $data, $options, $design);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Map.
     *
     * @param string $id
     * @param MapOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createMap(string $id, DataTable $data, MapOptions $options = new MapOptions()): Map
    {
        $chart = new Map($id, $data, $options);
        $this->addChart($chart);
        return $chart;
    }


    /**
     * Creates a new Org chart.
     *
     * @param string $id
     * @param OrgChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createOrgChart(string $id, DataTable $data, OrgChartOptions $options = new OrgChartOptions()): OrgChart
    {
        $chart = new OrgChart($id, $data, $options);
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
    public function createPieChart(string $id, DataTable $data, PieChartOptions $options = new PieChartOptions()): PieChart
    {
        $chart = new PieChart($id, $data, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new scatter chart.
     *
     * @param string $id
     * @param ScatterChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createScatterChart(string $id, DataTable $data, ScatterChartOptions $options = new ScatterChartOptions(), ChartDesign $design = ChartDesign::Classic): ScatterChart
    {
        $chart = new ScatterChart($id, $data, $options, $design);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new stepped area chart.
     *
     * @param string $id
     * @param SteppedAreaChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createSteppedAreaChart(string $id, DataTable $data, SteppedAreaChartOptions $options = new SteppedAreaChartOptions()): SteppedAreaChart
    {
        $chart = new SteppedAreaChart($id, $data, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new Table chart.
     *
     * @param string $id
     * @param TableChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createTableChart(string $id, DataTable $data, TableChartOptions $options = new TableChartOptions()): TableChart
    {
        $chart = new TableChart($id, $data, $options);
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
    public function createTimelineChart(string $id, DataTable $data, TimelineChartOptions $options = new TimelineChartOptions()): TimelineChart
    {
        $chart = new TimelineChart($id, $data, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Creates a new WordTree chart.
     *
     * @param string $id
     * @param WordTreeChartOptions $options
     * @throws InvalidArgumentException A chart with the given id was already created.
     */
    public function createWordTreeChart(string $id, DataTable $data, WordTreeChartOptions $options = new WordTreeChartOptions()): WordTreeChart
    {
        $chart = new WordTreeChart($id, $data, $options);
        $this->addChart($chart);
        return $chart;
    }

    /**
     * Renders the chart with the given id.
     * Includes script tags to load the required javascript files, if this
     * is the first call to this function.
     *
     * @param string|GoogleChart|null $chartOrId Chart to draw. If omitted, all charts are drawn.
     * @throws InvalidArgumentException No chart with the given id exists.
     * @return string
     */
    public function render(string|GoogleChart|null $chartOrId = null): string
    {
        $buffer = [];
        if (!$this->loaded) {
            $buffer = $this->load();
            $this->loaded = true;
        }

        if (is_null($chartOrId)) {
            foreach ($this->charts as $chart) {
                $buffer[] = $this->renderChart($chart);
            }
        } else {
            $buffer[] = $this->renderChart($chartOrId);
        }

        return implode($buffer);
    }

    /**
     * Get array of script tags to load the required JS files.
     * This method is automatically called on chart rendering, so
     * usually you don't need to call it manually.
     *
     * @throws Exception Charts have already been loaded.
     * @return array
     */
    public function load(): array
    {
        if ($this->loaded) {
            throw new Exception('scripts have already been loaded');
        }

        return $this->chartLoader->load($this->charts, $this->chartSettings);
    }

    private function renderChart(string|GoogleChart $chartOrId): string
    {
        if (is_string($chartOrId)) {
            if (!isset($this->charts[$chartOrId])) {
                throw new InvalidArgumentException("No chart with id '{$chartOrId}' found");
            }

            return sprintf(self::CHART_DIV, $chartOrId);
        } else {
            if (!in_array($chartOrId, $this->charts)) {
                throw new InvalidArgumentException("Chart is not handled by ChartService");
            }

            return sprintf(self::CHART_DIV, $chartOrId->getId());
        }
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
}
