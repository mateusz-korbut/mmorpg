let report = {
    init: function () {
        this.displayReport();
    },
    displayReport: function () {
        $.get("Services/getDailyStats.php", function (data) {
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
