let auth = {
    user: null,
    setUser: function (user) {
        this.user = user;
        $("#username").text(user.name);
    }
};

