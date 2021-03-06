<?php
$pageTitle = "Charts: Chart Customisation";
$pageDescription = "ag-Grid is a feature-rich data grid that can also chart data out of the box. Learn how to chart data directly from inside ag-Grid.";
$pageKeyboards = "Javascript Grid Charting";
$pageGroup = "feature";
include '../documentation-main/documentation_header.php';
?>

    <h1 class="heading-enterprise">Chart Customisation</h1>

    <p class="lead">
        Charts can be customised in a number of ways to suit your applications' requirements.
    </p>

    <h2>Overriding Chart Options</h2>

    <p>
        The primary mechanism for customising charts is via the following <code>gridOptions</code> callback:
    </p>

<snippet>
gridOptions.processChartOptions?(params: ProcessChartOptionsParams): ChartOptions;

interface ProcessChartOptionsParams {
    type: ChartType;
    options: ChartOptions;
}

type ChartType =
    'groupedColumn' |
    'stackedColumn' |
    'normalizedColumn' |
    'groupedBar' |
    'stackedBar' |
    'normalizedBar' |
    'line' |
    'scatter' |
    'bubble' |
    'pie' |
    'doughnut' |
    'area' |
    'stackedArea' |
    'normalizedArea';
</snippet>

    <p>
        This callback is invoked once, before the chart is created, with <code>ProcessChartOptionsParams</code>.
    </p>

    <p>
        The params object contains a <code>type</code> property corresponding to the chart about to be created, along with
        the <code>ChartOptions</code> that are about to be applied.
    </p>

    <p>
        There are different available options to configure depending on the type of chart. Please refer to the relevant section below for more details:
        <ul>
            <li><a href="../javascript-grid-charts-customisation-general/">General Chart Customisation</a> (these apply to all chart types)</li>
            <li><a href="../javascript-grid-charts-customisation-bar/">Bar/Column Chart Customisation</a></li>
            <li><a href="../javascript-grid-charts-customisation-line/">Line Chart Customisation</a></li>
            <li><a href="../javascript-grid-charts-customisation-scatter/">Scatter/Bubble Chart Customisation</a></li>
            <li><a href="../javascript-grid-charts-customisation-area/">Area Chart Customisation</a></li>
            <li><a href="../javascript-grid-charts-customisation-pie/">Pie/Doughnut Chart Customisation</a></li>
        </ul>
    </p>

    <h3>Example: Customising Charts</h3>

    <p>
        The example below demonstrates:
    </p>

    <ul>
        <li><b>Stacked Bar</b>, <b>Grouped Bar</b> and <b>Normalized Bar</b> charts have the legend docked to the <code>bottom</code>.</li>
        <li><b>Stacked Column</b>, <b>Grouped Column</b> and <b>Normalized Column</b> charts have the legend docked to the <code>right</code>.</li>
        <li><b>Line</b> charts have the legend docked to the <code>left</code>.</li>
        <li><b>Scatter</b> charts have the legend docked to the <code>right</code>.</li>
        <li><b>Pie</b> charts have the legend docked to the <code>top</code>.</li>
        <li><b>Doughnut</b> charts have the legend docked to the <code>right</code>.</li>
    </ul>

    <?= example('Customising Charts', 'custom-chart', 'generated', array("enterprise" => true)) ?>

    <h2>Saving User Preferences</h2>

    <p>
        Formatting changes made by users through the Format Panel can be captured, saved and restored through the
        <code>ChartOptionsChanged</code> event, see interface below:
    </p>

<snippet>
interface ChartOptionsChanged extends AgEvent {
    chartType: ChartType;
    chartOptions: ChartOptions;
}

type ChartType =
    'groupedColumn' |
    'stackedColumn' |
    'normalizedColumn' |
    'groupedBar' |
    'stackedBar' |
    'normalizedBar' |
    'line' |
    'scatter' |
    'bubble' |
    'pie' |
    'doughnut' |
    'area' |
    'stackedArea' |
    'normalizedArea';
</snippet>

    <h3>Example: Saving User Preferences</h3>
    
    <p>
        The example below demonstrates how the <code>ChartOptionsChanged</code> event can be used to save and restore
        user chart formatting preferences. Notice the following:
    </p>

    <ul>
        <li><b>Saving Options by Chart Type</b>: format changes (via the format panel) are preserved after leaving and
            returning to the chart by using the <code>savedUserPreferenceByChartType</code> object to keep track of user
            format changes on a per-chart type basis.</li>
        <li><b>Saving Global Chart Options</b>: changes made to the legend options are applied to all new charts by using
            the <code>savedLegendUserPreference</code> object to globally keep track of legend preferences.</li>
    </ul>

    <?= example('Saving User Preferences', 'saving-user-preferences', 'generated', array("exampleHeight" => 660,"enterprise" => true)) ?>

<?php include '../documentation-main/documentation_footer.php'; ?>
