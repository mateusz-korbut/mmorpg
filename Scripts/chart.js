let chart = {
    chart: null,
    init: function (title, data, canvas) {
        const options = {
            backgroundColor: "rgb(255,255,255, 0.5)",
            title:{
                text: title,
                fontColor: "black"
            },
            data: [{
                type: "pie",
                toolTipContent: "<b>{name}</b>: {y} (#percent%)",
                indexLabel: "{name}",
                indexLabelPlacement: "inside",
                dataPoints: data
            }]
        };

        $(canvas).CanvasJSChart(options);
    },
    series: function (registrations, logged_in) {
        this.chart = new CanvasJS.Chart("reportChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Site Traffic"
            },
            axisX:{
                valueFormatString: "DD MMM",
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true
                }
            },
            axisY: {
                title: "Number of registrations",
                crosshair: {
                    enabled: true
                }
            },
            toolTip:{
                shared:true
            },
            legend:{
                cursor:"pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: chart.toggleDataSeries
            },
            data: [{
                type: "line",
                showInLegend: true,
                name: "Registrations",
                markerType: "square",
                xValueFormatString: "DD MMM, YYYY",
                color: "#F08080",
                dataPoints: registrations
            },
                {
                    type: "line",
                    showInLegend: true,
                    name: "Logged in",
                    lineDashType: "dash",
                    dataPoints: logged_in
                }]
        });
        this.chart.render();
    },
    toggleDataSeries: function(e) {
        e.dataSeries.visible = !(typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible);
        this.chart.render();
    }
};