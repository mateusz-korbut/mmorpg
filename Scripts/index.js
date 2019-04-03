let index = {
    init: function () {
        $("#logoutBtn").click(function () {
            index.logout();
        });

        $("#loginForm").submit(function(event) {
            index.handleSubmit($( this ), event, "Services/Auth/login.php");
        });

        $("#registerForm").submit(function(event) {
            index.handleSubmit($( this ), event, "Services/Auth/register.php");
        });

        this.displayStats();
    },
    sendUser: function (url, user) {
        $.post(url, { name: user.name, password: user.password }, function(data) {
            console.log(data);
            toaster.show(data);
            location.reload();
        })
            .fail(function(data) {
                console.log(data);

                toaster.show(data);
            });
    },
    logout: function () {
        $.get("Services/logout.php", function (data) {
            toaster.show(data);
            location.reload();
        })
            .fail(function(data) {
                toaster.show(data);
            })
    },
    getUserFromForm: function ($form) {
        const name = $form.find("input[name='name']").val();
        const password = $form.find("input[name='password']").val();

        return {
            "name": name,
            "password": password
        };
    },
    handleSubmit: function ($form, event, url) {
        event.preventDefault();
        let user = index.getUserFromForm($form);

        if (user.name !== undefined && user.password !== undefined)
            index.sendUser(url, user);
    },
    displayStats: function () {
        $.get("Services/Stats/getUserCharacters.php", function (data) {
            toaster.show(data);
            console.log(data);
            $("#quantityCharacters").text(data);
        })
            .fail(function(data) {
                toaster.show(data);
            });
    }
};

$(document).ready(function() {
    index.init();
});
