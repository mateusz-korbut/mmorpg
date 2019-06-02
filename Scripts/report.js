let report = {
    init: function () {
        this.displayReport();
    },
    displayReport: function () {
        let scriptUrl = "Services/getDailyStats.php?";
        const url = new URL(window.location.href);
        const fromParam = url.searchParams.get("from");
        const toParam = url.searchParams.get("to");
        if (fromParam) {
            scriptUrl += "from=" + fromParam;
            $('#from').val(fromParam);

        }
        if (toParam) {
            scriptUrl += "&to=" + toParam;
            $('#to').val(toParam);
        }

        $.get(scriptUrl, function (data) {
            toaster.show(data);
            data = JSON.parse(data);
            let login = [];
            let register = [];

            data.forEach(e => {
                login.push({x: report.toDate(e.date), y: parseInt(e.logged_in)});
                register.push({x: report.toDate(e.date), y: parseInt(e.registered)});
            });

            chart.series(register, login);
        })
            .fail(function(data) {
                toaster.show(data);
            });
    },
    toDate(string) {
        return new Date(string.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    }
};

$(document).ready(function() {
    report.init();
});
