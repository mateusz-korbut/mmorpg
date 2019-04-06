let manage = {
    prevRole: null,
    prevStatus: null,
    select: null,
    form: null,
    updateRole: function (select, userId) {
        event.preventDefault();
        manage.select = select;
        const roleId = select.val();

        $.post("Services/Manage/changeUserRole.php", { roleId: roleId, userId: userId}, function() {
            console.log("Updated");
        })
            .fail(function(data) {
                toaster.show(data);
                manage.select.val(manage.prevRole);
            });
    },
    updateStatus: function (select, userId) {
        event.preventDefault();
        manage.select = select;
        const statusId = select.val();

        $.post("Services/Manage/changeUserStatus.php", { statusId: statusId, userId: userId}, function() {
            console.log("Updated");
        })
            .fail(function(data) {
                toaster.show(data);
                manage.select.val(manage.prevStatus);
            });
    },
    displayUserCharacters: function (id, name) {
        $("#userCharactersTable").load(`./Templates/Manage/userCharacters.php?id=${id}`);
        $("#charactersCreatorName").text(name);
        $("#userCharacters").modal("show");
    },
    saveChanges: function () {
        let characters = [];

        $("#characters form").each(function(i, $form) {
            const id = $form.id.value;
            const level = $form.level.value;
            const health_points = $form.health_points.value;
            const coins = $form.coins.value;
            characters.push(manage.createCharacterToUpdate(id, level, health_points, coins));
        });

        $.post("Services/Manage/updateUserCharacters.php", { characters: characters }, function() {
            console.log("Updated");
        })
            .fail(function(data) {
                toaster.show(data);
            });
    },
    createCharacterToUpdate(id, level, health_points, coins) {
        return { id: id, level: level, health_points: health_points, coins: coins};
    }
};
