/**
 * Draw Google charts.
 * Google charts java script file must have been loaded (https://www.gstatic.com/charts/loader.js).
 *
 * @author Johannes Aberidis <jo@sportlog.at>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */
class GoogleCharts {
    static chartLoadCallback;

    /**
     * A callback which is executed whenever a chart is drawn
     * 
     * @param {*} callback A callback accepting 4 parameters (chartId, data, options)
     */
    static setOnLoadCallback(callback) {
        this.chartLoadCallback = callback;
    }

    /**
     * Draws a list of charts.
     *
     * @param [] chartsData Array of charts to draw
     */
    static loadCharts(chartsData) {
        // get distinct list of packages
        const packages = [
            ...new Set(chartsData.map((c) => this.getPackage(c.type, c.design))),
        ];
        // Load the Visualization API and the packages.
        google.charts.load('current', { packages }).then(() => {
            this.drawCharts(chartsData);
        });
    }

    /**
     * Draws the charts
     *
     * @param {*} charts
     */
    static drawCharts(charts) {
        charts.forEach((chart) => {
            var data = new google.visualization.DataTable(chart.data);
            var options = chart.options;
            var element = document.getElementById(chart.id);
            if (element) {
                var c = this.drawChart(chart.type, chart.design, data, options, element);
                if (this.chartLoadCallback) {
                    this.chartLoadCallback(chart.id, c, data, options);
                }
            }
        });
    }

    /**
     * Gets the package which needs to be loaded for the chart type
     *
     * @param string chartType
     * @param string design Either 'classic' for classic design, or 'material' for material design.
     * @returns
     */
    static getPackage(chartType, design) {
        switch (design) {
            case 'classic':
                return this.getClassicPackage(chartType);

            case 'material':
                return this.getMaterialPackage(chartType);

            default:
                throw new Error(`unhandled design type ${design}`)
        }
    }

      /**
     * Gets the classic design package for the chart type.
     * 
     * @param string chartType 
     * @returns 
     */
    static getClassicPackage(chartType) {
        switch (chartType) {
            case 'Annotation':
                return 'annotationchart';
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
            default: {
                return 'corechart';
            }
        }
    }

    /**
     * Gets the material design package for the chart type.
     * 
     * @param string chartType 
     * @returns 
     */
    static getMaterialPackage(chartType) {
        switch (chartType) {
            case 'Bar':
            case 'Column':
                return 'bar';

            case 'Line':
                return 'line';

            default:
                throw new Error(`material design not supported for chart type '${chartType}'`);
        }
    }

   
    /**
     * Creates the chart and draws it.
     * 
     * @param string chartType 
     * @param string design 
     * @param DataTable dataTable 
     * @param unkown options 
     * @param HtmlElement element 
     */
    static drawChart(chartType, design, dataTable, options, element) {
        switch (design) {
            case 'classic':
                return this.drawClassicChart(chartType, dataTable, options, element);

            case 'material':
                return this.drawMaterialChart(chartType, dataTable, options, element);

            default:
                throw new Error(`unhandled design type ${design}`)
        }
    }

    /**
     * Draws chart in classic style.
     */
    static drawClassicChart(chartType, dataTable, options, element) {
        switch (chartType) {
            case 'Annotation': {
                const chart = new google.visualization.AnnotationChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Area': {
                const chart = new google.visualization.AreaChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Bar': {
                const chart = new google.visualization.BarChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Bubble': {
                const chart = new google.visualization.BubbleChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Calendar': {
                const chart = new google.visualization.Calendar(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Candlestick': {
                const chart = new google.visualization.CandlestickChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Column': {
                const chart = new google.visualization.ColumnChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Combo': {
                const chart = new google.visualization.ComboChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Gantt': {
                const chart = new google.visualization.Gantt(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Gauge': {
                const chart = new google.visualization.Gauge(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Geo': {
                const chart = new google.visualization.GeoChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Histogram': {
                const chart = new google.visualization.Histogram(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Line': {
                const chart = new google.visualization.LineChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Org': {
                const chart = new google.visualization.OrgChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Map': {
                const chart = new google.visualization.Map(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Pie': {
                const chart = new google.visualization.PieChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Sankey': {
                const chart = new google.visualization.Sankey(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Scatter': {
                const chart = new google.visualization.ScatterChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'SteppedArea': {
                const chart = new google.visualization.SteppedAreaChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Table': {
                const chart = new google.visualization.Table(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'Timeline': {
                const chart = new google.visualization.Timeline(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case 'TreeMap': {
                const chart = new google.visualization.TreeMap(element);
                chart.draw(dataTable, options);
                return chart;
            }
            // case 'WordTree':
            //   return new google.visualization.W(element);
            default:
                throw new Error(`chart not supported: ${chartType}`);
        }
    }

    /**
     * Draws chart in material design.
     * All core charts are supported.
     */
    static drawMaterialChart(chartType, dataTable, options, element) {
        switch (chartType) {
            case 'Bar':
            case 'Column': {
                const chart = new google.charts.Bar(element);
                chart.draw(dataTable, google.charts.Bar.convertOptions(options));
                return chart;
            }

            case 'Line': {
                const chart = new google.charts.Line(element);
                chart.draw(dataTable, google.charts.Line.convertOptions(options));
                return chart;
            }

            default:
                throw new Error(`material design not supported for chart type '${chartType}'`);
        }
    }
}
