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
            const charactersQuantity = JSON.parse(data).characters;

            if (charactersQuantity)
                $("#quantityCharacters").text(charactersQuantity);
        })
            .fail(function(data) {
                toaster.show(data);
            });

        $.get("Services/Stats/getUserCoins.php", function (data) {
            toaster.show(data);
            const coins = JSON.parse(data).coins;

            if (coins)
                $("#coins").text(coins);
        })
            .fail(function(data) {
                toaster.show(data);
            });

        $.get("Services/Stats/getUserCharacterMaxLevel.php", function (data) {
            toaster.show(data);
            const maxLevel = JSON.parse(data).level;

            if (maxLevel)
                $("#maxLevel").text(maxLevel);
        })
            .fail(function(data) {
                toaster.show(data);
            });

        $.get("Services/Stats/getUserFavouriteRace.php", function (data) {
            toaster.show(data);
            const raceName = JSON.parse(data).name;

            if (raceName)
                $("#favouriteRace").text(raceName);
        })
            .fail(function(data) {
                toaster.show(data);
            });
    }
};

$(document).ready(function() {
    index.init();
});
