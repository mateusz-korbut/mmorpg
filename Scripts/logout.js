let logout = {
    init: function () {
        $("#logoutBtn").click(function () {
            logout.logout();
        });
    },
    logout: function () {
        $.get("Services/Auth/logout.php", function (data) {
            toaster.show(data);
            window.location =  "./";
        })
            .fail(function(data) {
                toaster.show(data);
            })
    },
};

$(document).ready(function() {
    logout.init();
});
