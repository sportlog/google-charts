import { Loader } from "@googlemaps/js-api-loader";
import {
  Chart,
  ChartDesign,
  ChartLoadCallback,
  ChartType,
  Charts,
} from "./types";

/**
 * Draw Google charts.
 * Google charts java script file must have been loaded (https://www.g.com/charts/loader.js).
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */
class GoogleChartsService {
  private readonly loader: Loader;

  constructor(
    apiKey: string,
    private readonly chartLoadCallback?: ChartLoadCallback
  ) {
    this.loader = new Loader({ apiKey });
  }

  /**
   * Draws a list of  harts.
   *
   * @param [] chartsData Array of charts to draw
   */
  loadCharts(chartsData: Charts) {
    // get distinct list of packages
    const packages = [
      ...new Set(
        chartsData.charts.map((c) => this.getPackage(c.type, c.design))
      ),
    ];

    const mapsApiKey = chartsData?.settings?.mapsApiKey;

    // Load the Visualization API and the packages.
    google.charts.load({ packages, mapsApiKey }).then(() => {
      this.drawCharts(chartsData.charts);
    });
  }

  /**
   * Draws the charts
   *
   * @param {*} charts
   */
  drawCharts(charts: Chart[]) {
    charts.forEach((chart) => {
      const element = document.getElementById(chart.id);
      if (element) {
        const data = new google.visualization.DataTable(chart.data);
        const c = this.drawChart(
          chart.type,
          chart.design,
          data,
          chart.options,
          element
        );

        if (this.chartLoadCallback) {
          this.chartLoadCallback(chart.id, c, data, chart.options);
        }
      }
    });
  }

  /**
   * Gets the package which needs to be loaded for the chart type
   *
   * @param ChartType chartType
   * @param ChartDesign design Either 'classic' for classic design, or 'material' for material design.
   * @returns
   */
  private getPackage(chartType: ChartType, design: ChartDesign): string {
    switch (design) {
      case ChartDesign.Classic:
        return this.getClassicPackage(chartType);

      case ChartDesign.Material:
        return this.getMaterialPackage(chartType);

      default:
        throw new Error(`unhandled design type ${design}`);
    }
  }

  /**
   * Gets the classic design package for the chart type.
   *
   * @param string chartType
   * @returns
   */
  private getClassicPackage(chartType: ChartType): string {
    switch (chartType) {
      case "Calendar":
        return "calendar";
      case "Gantt":
        return "gantt";
      case "Gauge":
        return "gauge";
      case "Geo":
        return "geochart";
      case "Map":
        return "map";
      case "Org":
        return "orgchart";
      case "Table":
        return "table";
      case "Timeline":
        return "timeline";
      case "TreeMap":
        return "treemap";
      case "WordTree":
        return "wordtree";
      default: {
        return "corechart";
      }
    }
  }

  /**
   * Gets the material design package for the chart type.
   *
   * @param ChartType chartType
   * @returns
   */
  private getMaterialPackage(chartType: ChartType) {
    switch (chartType) {
      case "Bar":
      case "Column":
        return "bar";

      case "Line":
        return "line";

      case "Scatter":
        return "scatter";

      default:
        throw new Error(
          `material design not supported for chart type '${chartType}'`
        );
    }
  }

  /**
   * Creates the chart and draws it.
   */
  private drawChart(
    chartType: ChartType,
    design: ChartDesign,
    dataTable: google.visualization.DataTable,
    options: unknown,
    element: HTMLElement
  ) {
    switch (design) {
      case "classic":
        return this.drawClassicChart(chartType, dataTable, options, element);

      case "material":
        return this.drawMaterialChart(chartType, dataTable, options, element);

      default:
        throw new Error(`unhandled design type ${design}`);
    }
  }

  /**
   * Draws chart in classic style.
   */
  private drawClassicChart(
    chartType: ChartType,
    dataTable: google.visualization.DataTable,
    options: unknown,
    element: HTMLElement
  ): google.visualization.ChartBase {
    switch (chartType) {
      // case "Annotation": {
      //   const chart = new google.visualization.AnnotationChart(element);
      //   chart.draw(dataTable, options);
      //   return chart;
      // }
      case "Area": {
        const chart = new google.visualization.AreaChart(element);
        chart.draw(dataTable, options as google.visualization.AreaChartOptions);
        return chart;
      }
      case "Bar": {
        const chart = new google.visualization.BarChart(element);
        chart.draw(dataTable, options as google.visualization.BarChartOptions);
        return chart;
      }
      case "Bubble": {
        const chart = new google.visualization.BubbleChart(element);
        chart.draw(
          dataTable,
          options as google.visualization.BubbleChartOptions
        );
        return chart;
      }
      case "Calendar": {
        const chart = new google.visualization.Calendar(element);
        chart.draw(dataTable, options as google.visualization.CalendarOptions);
        return chart;
      }
      case "Candlestick": {
        const chart = new google.visualization.CandlestickChart(element);
        chart.draw(
          dataTable,
          options as google.visualization.CandlestickChartOptions
        );
        return chart;
      }
      case "Column": {
        const chart = new google.visualization.ColumnChart(element);
        chart.draw(
          dataTable,
          options as google.visualization.ColumnChartOptions
        );
        return chart;
      }
      case "Combo": {
        const chart = new google.visualization.ComboChart(element);
        chart.draw(
          dataTable,
          options as google.visualization.ComboChartOptions
        );
        return chart;
      }
      case "Gantt": {
        const chart = new google.visualization.Gantt(element);
        chart.draw(
          dataTable,
          options as google.visualization.GanttChartOptions
        );
        return chart;
      }
      case "Gauge": {
        const chart = new google.visualization.Gauge(element);
        chart.draw(
          dataTable,
          options as google.visualization.GaugeChartOptions
        );
        return chart;
      }
      case "Geo": {
        const chart = new google.visualization.GeoChart(element);
        chart.draw(dataTable, options as google.visualization.GeoChartOptions);
        return chart;
      }
      case "Histogram": {
        const chart = new google.visualization.Histogram(element);
        chart.draw(dataTable, options as google.visualization.HistogramOptions);
        return chart;
      }
      case "Line": {
        const chart = new google.visualization.LineChart(element);
        chart.draw(dataTable, options as google.visualization.LineChartOptions);
        return chart;
      }
      case "Org": {
        const chart = new google.visualization.OrgChart(element);
        chart.draw(dataTable, options as google.visualization.OrgChartOptions);
        return chart;
      }
      case "Map": {
        const chart = new google.visualization.Map(element);
        chart.draw(dataTable, options as google.visualization.MapOptions);
        return chart;
      }
      case "Pie": {
        const chart = new google.visualization.PieChart(element);
        chart.draw(dataTable, options as google.visualization.PieChartOptions);
        return chart;
      }
      // case "Sankey": {
      //   const chart = new google.visualization.Sankey(element);
      //   chart.draw(dataTable, options);
      //   return chart;
      // }
      case "Scatter": {
        const chart = new google.visualization.ScatterChart(element);
        chart.draw(
          dataTable,
          options as google.visualization.ScatterChartOptions
        );
        return chart;
      }
      case "SteppedArea": {
        const chart = new google.visualization.SteppedAreaChart(element);
        chart.draw(
          dataTable,
          options as google.visualization.SteppedAreaChartOptions
        );
        return chart;
      }
      case "Table": {
        const chart = new google.visualization.Table(element);
        chart.draw(dataTable, options as google.visualization.TableOptions);
        return chart;
      }
      case "Timeline": {
        const chart = new google.visualization.Timeline(element);
        chart.draw(dataTable, options as google.visualization.TimelineOptions);
        return chart;
      }
      case "TreeMap": {
        const chart = new google.visualization.TreeMap(element);
        chart.draw(dataTable, options as google.visualization.TreeMapOptions);
        return chart;
      }
      // case "WordTree": {
      //   const chart = new google.visualization.WordTree(element);
      //   chart.draw(dataTable, options);
      //   return chart;
      // }
      default:
        throw new Error(`chart not supported: ${chartType}`);
    }
  }

  /**
   * Draws chart in material design.
   * All core charts are supported.
   */
  drawMaterialChart(chartType, dataTable, options, element) {
    switch (chartType) {
      case "Bar":
      case "Column": {
        const chart = new google.charts.Bar(element);
        chart.draw(dataTable, google.charts.Bar.convertOptions(options));
        return chart;
      }

      case "Line": {
        const chart = new google.charts.Line(element);
        chart.draw(dataTable, google.charts.Line.convertOptions(options));
        return chart;
      }

      case "Scatter": {
        const chart = new google.charts.Scatter(element);
        chart.draw(dataTable, google.charts.Scatter.convertOptions(options));
        return chart;
      }

      default:
        throw new Error(
          `material design not supported for chart type '${chartType}'`
        );
    }
  }
}
