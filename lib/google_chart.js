"use strict";
class GoogleCharts2 {
    static setOnLoadCallback(callback) {
        this.chartLoadCallback = callback;
    }
    static loadCharts(chartsData) {
        var _a;
        const packages = [
            ...new Set(chartsData.charts.map((c) => this.getPackage(c.type, c.design))),
        ];
        const mapsApiKey = (_a = chartsData === null || chartsData === void 0 ? void 0 : chartsData.settings) === null || _a === void 0 ? void 0 : _a.mapsApiKey;
        google.charts.load("current", { packages, mapsApiKey }).then(() => {
            this.drawCharts(chartsData.charts);
        });
    }
    static drawCharts(charts) {
        charts.forEach((chart) => {
            let element = document.getElementById(chart.id);
            if (element) {
                let data = new google.visualization.DataTable(chart.data);
                let c = this.drawChart(chart.type, chart.design, data, chart.options, element);
                if (this.chartLoadCallback) {
                    this.chartLoadCallback(chart.id, c, data, chart.options);
                }
            }
        });
    }
    static getPackage(chartType, design) {
        switch (design) {
            case "classic":
                return this.getClassicPackage(chartType);
            case "material":
                return this.getMaterialPackage(chartType);
            default:
                throw new Error(`unhandled design type ${design}`);
        }
    }
    static getClassicPackage(chartType) {
        switch (chartType) {
            case "Annotation":
                return "annotationchart";
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
            case "Sankey":
                return "sankey";
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
    static getMaterialPackage(chartType) {
        switch (chartType) {
            case "Bar":
            case "Column":
                return "bar";
            case "Line":
                return "line";
            case "Scatter":
                return "scatter";
            default:
                throw new Error(`material design not supported for chart type '${chartType}'`);
        }
    }
    static drawChart(chartType, design, dataTable, options, element) {
        switch (design) {
            case "classic":
                return this.drawClassicChart(chartType, dataTable, options, element);
            case "material":
                return this.drawMaterialChart(chartType, dataTable, options, element);
            default:
                throw new Error(`unhandled design type ${design}`);
        }
    }
    static drawClassicChart(chartType, dataTable, options, element) {
        switch (chartType) {
            case "Annotation": {
                const chart = new google.visualization.AnnotationChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Area": {
                const chart = new google.visualization.AreaChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Bar": {
                const chart = new google.visualization.BarChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Bubble": {
                const chart = new google.visualization.BubbleChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Calendar": {
                const chart = new google.visualization.Calendar(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Candlestick": {
                const chart = new google.visualization.CandlestickChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Column": {
                const chart = new google.visualization.ColumnChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Combo": {
                const chart = new google.visualization.ComboChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Gantt": {
                const chart = new google.visualization.Gantt(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Gauge": {
                const chart = new google.visualization.Gauge(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Geo": {
                const chart = new google.visualization.GeoChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Histogram": {
                const chart = new google.visualization.Histogram(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Line": {
                const chart = new google.visualization.LineChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Org": {
                const chart = new google.visualization.OrgChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Map": {
                const chart = new google.visualization.Map(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Pie": {
                const chart = new google.visualization.PieChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Sankey": {
                const chart = new google.visualization.Sankey(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Scatter": {
                const chart = new google.visualization.ScatterChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "SteppedArea": {
                const chart = new google.visualization.SteppedAreaChart(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Table": {
                const chart = new google.visualization.Table(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "Timeline": {
                const chart = new google.visualization.Timeline(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "TreeMap": {
                const chart = new google.visualization.TreeMap(element);
                chart.draw(dataTable, options);
                return chart;
            }
            case "WordTree": {
                const chart = new google.visualization.WordTree(element);
                chart.draw(dataTable, options);
                return chart;
            }
            default:
                throw new Error(`chart not supported: ${chartType}`);
        }
    }
    static drawMaterialChart(chartType, dataTable, options, element) {
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
                throw new Error(`material design not supported for chart type '${chartType}'`);
        }
    }
}
//# sourceMappingURL=google_chart.js.map