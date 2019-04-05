let auth = {
    user: null,
    setUser: function (user) {
        this.user = user;
        $("#username").text(user.name);
    },
    deleteUser: function (id) {
        $.post("Services/User/deleteUser.php", { id: id }, function() {
            console.log("Deleted");
            $(`#character-${id}`).hide();
        })
            .fail(function(data) {
                console.log(data);
                toaster.show(data);
            });
    },
};

