/**
 * Draw Google charts.
 * Google charts java script file must have been loaded (https://www.gstatic.com/charts/loader.js).
 * 
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */
class GoogleCharts {
  /**
   * Draws a list of charts.
   *
   * @param [] chartsData Array of charts to draw
   */
  static loadCharts(chartsData) {
    // get distinct list of packages
    const packages = [
      ...new Set(chartsData.map((c) => this.getPackage(c.chartType))),
    ];

    // Load the Visualization API and the packages.
    google.charts.load('current', { packages }).then(() => {
      this.drawChart(chartsData);
    });
  }

  /**
   * Draws the chart
   *
   * @param {*} charts
   */
  static drawChart(charts) {
    charts.forEach((chart) => {
      var data = new google.visualization.DataTable(chart.data);
      var options = chart.options;

      var element = document.getElementById(chart.id);
      var chart = this.getChart(chart.chartType, element);

      chart.draw(data, options);
    });
  }

  /**
   * Gets the package which needs to be loaded for the chart type
   *
   * @param string chartType
   * @returns
   */
  static getPackage(chartType) {
    switch (chartType) {
      case 'Calendar':
        return 'calendar';
      case 'Gantt':
        return 'gantt';
      case 'Gauge':
        return 'gauge';
      case 'Geo':
        return 'geochart';
      case 'Map':
        return 'map';
      case 'Org':
        return 'orgchart'; 
      case 'Sankey':
        return 'sankey';
      case 'Table':
        return 'table';
      case 'Timeline':
        return 'timeline';
      case 'TreeMap':
        return 'treemap';
      case 'WordTree':
        return 'wordtree';
      default:
        return 'corechart';
    }
  }

  /**
   * Instiatates a new chart for that provided chart type.
   *
   * @param string chartType
   * @param HtmlElement element
   * @returns
   */
  static getChart(chartType, element) {
    switch (chartType) {
      case 'Area':
        return new google.visualization.AreaChart(element);
      case 'Bar':
        return new google.visualization.BarChart(element);
      case 'Bubble':
        return new google.visualization.BubbleChart(element);
      case 'Calendar':
        return new google.visualization.Calendar(element);
      case 'Candlestick':
        return new google.visualization.CandlestickChart(element);
      case 'Column':
        return new google.visualization.ColumnChart(element);
      case 'Combo':
        return new google.visualization.ComboChart(element);
      case 'Gantt':
        return new google.visualization.Gantt(element);
      case 'Gauge':
        return new google.visualization.Gauge(element);
      case 'Geo':
        return new google.visualization.GeoChart(element);
      case 'Histogram':
        return new google.visualization.Histogram(element);
      case 'Line':
        return new google.visualization.LineChart(element);
      case 'Org':
        return new google.visualization.OrgChart(element);
      case 'Map':
        return new google.visualization.Map(element);
      case 'Pie':
        return new google.visualization.PieChart(element);
      case 'Sankey':
        return new google.visualization.Sankey(element);
      case 'Scatter':
        return new google.visualization.ScatterChart(element);
      case 'SteppedArea':
        return new google.visualization.SteppedAreaChart(element);
      case 'Table':
        return new google.visualization.Table(element);
      case 'Timeline':
        return new google.visualization.Timeline(element);
      case 'TreeMap':
        return new google.visualization.TreeMap(element);
      case 'WordTree':
        return new google.visualization.WordTree(element);
      default:
        throw new Error(`chart not supported: ${chartType}`);
    }
  }
}
