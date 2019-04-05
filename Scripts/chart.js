let chart = {
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
};