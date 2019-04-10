let index = {
    init: function () {
        if (auth.user !== null) {
            this.displayStats();
        } else {
            $("#login").click(function(event) {
                index.handleSubmit(event, "Services/Auth/login.php");
            });

            $("#register").click(function(event) {
                index.handleSubmit(event, "Services/Auth/register.php");
            });
        }
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
    getUserFromForm: function ($form) {
        const name = $form.find("input[name='name']").val();
        const password = $form.find("input[name='password']").val();

        return {
            "name": name,
            "password": password
        };
    },
    handleSubmit: function (event, url) {
        event.preventDefault();
        let user = index.getUserFromForm($("#userForm"));

        if (user.name !== undefined && user.password !== undefined)
            index.sendUser(url, user);
    },
    displayStats: function () {
        $.get("Services/Stats/getUserCharacters.php", function (data) {
            toaster.show(data);
            const characters = JSON.parse(data);
            let levels = [];
            let coins = [];
            let health = [];

            characters.forEach(e => levels.push({name: e.name, y: parseInt(e.level)}));
            characters.forEach(e => coins.push({name: e.name, y: parseInt(e.coins)}));
            characters.forEach(e => health.push({name: e.name, y: parseInt(e.health_points)}));

            chart.init("Levels", levels, "#levelsChart");
            chart.init("Coins", coins, "#coinsChart");
            chart.init("Health Points", health, "#healthChart");
        })
            .fail(function(data) {
                toaster.show(data);
            });

        $.get("Services/Stats/getUserCharactersRacesQuantity.php", function (data) {
            toaster.show(data);
            const characters = JSON.parse(data);
            let races = [];

            characters.forEach(e => races.push({name: e.name, y: parseInt(e.quantity)}));

            chart.init("Races", races, "#raceChart");
        })
            .fail(function(data) {
                toaster.show(data);
            });
    }
};

$(document).ready(function() {
    index.init();
});
