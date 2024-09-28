export type ChartLoadCallback = (chart: Chart) => void;

export enum ChartDesign {
  Classic = "classic",
  Material = "material",
}

export enum ChartType {
  Area = "Area",
  Calendar = "Calendar",
  Candlestick = "Candlestick",
  Bar = "Bar",
  Bubble = "Bubble",
  Column = "Column",
  Combo = "Combo",
  Gantt = "Gantt",
  Gauge = "Gauge",
  Geo = "Geo",
  Histogram = "Histogram",
  Line = "Line",
  Map = "Map",
  Org = "Org",
  Pie = "Pie",
  Scatter = "Scatter",
  SteppedArea = "SteppedArea",
  Table = "Table",
  Timeline = "Timeline",
  TreeMap = "TreeMap",
  WordTree = "WordTree",
}

export interface Charts {
  charts: Chart[];
  settings?: ChartsSettings;
}

export interface ChartsSettings {
  mapsApiKey?: string;
}

export interface Chart {
  readonly id: string;
  readonly options: unknown;
  readonly type: ChartType;
  readonly design: ChartDesign;
  readonly data: google.visualization.DataTable;
}
