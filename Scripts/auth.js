let auth = {
    user: null,
    init: function (user) {
        this.user = user;
        $("#username").text(user.name);
    },
};

