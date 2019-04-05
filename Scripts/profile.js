let profile = {
    init: function() {
        $("#createCharacter").click(function(event) {
            event.preventDefault();

            profile.createCharacter(event);
        });

        $("#editUsername").click(function (event) {
            event.preventDefault();

            profile.editUserName()
        })
    },
    editUserName: function () {
        const cardTitle = $("#profileName");
        let username = cardTitle.text();

        let form = $('<form class="input-group"></form>');
        const charNameInput = $('<input />', {
            'type': 'text',
            'name': 'name',
            'value': username,
            'class': 'form-control'
        });
        const submit = $('<button class="input-group-text btn btn-outline-primary">Change</button>');

        form.append(charNameInput);
        form.append(submit);
        form.submit(function(event) {
            profile.updateUserName(form, event);
        });

        cardTitle.replaceWith(form);
    },
    editCharacter: function (id) {
        const span = $(`#name-${id}`);
        let charName = span.text();

        let form = $('<form class="input-group"></form>');
        const charNameInput = $('<input />', {
            'type': 'text',
            'name': 'name',
            'value': charName
        });
        const submit = $('<button class="input-group-text btn btn-outline-primary">Change</button>');

        form.append(charNameInput);
        form.append(submit);
        form.submit(function(event) {
            profile.updateCharacter(form, event, id);
        });

        span.replaceWith(form);
    },
    updateCharacter: function ($form, event, id) {
        event.preventDefault();
        const name = $form.find("input[name='name']").val();

        if (name !== undefined)
            $.post("Services/Character/editCharacterName.php", { id: id, name: name }, function() {
                console.log("Updated");
                let span = "<span>" + name + "</span>";
                $form.replaceWith(span);
            })
                .fail(function(data) {
                    console.log(data);
                    toaster.show(data);
                });
    },
    deleteCharacter: function (id) {
        $.post("Services/Character/deleteCharacter.php", { id: id }, function() {
            console.log("Deleted");
            $(`#character-${id}`).hide();
        })
            .fail(function(data) {
                console.log(data);
                toaster.show(data);
            });
    },
    createCharacter: function () {
        const $form = $("#characterForm");
        const name = $form.find("input[name='name']");
        const raceId = $form.find("select[name='raceId']");

        if (name !== undefined && raceId !== undefined)
            $.post("Services/Character/createCharacter.php", { name: name.val(), raceId: raceId.val() }, function(data) {
                console.log(data);
                toaster.show(data);

                name.val("");
                raceId.val("1");
                $("#charCreatorModal").modal("hide");
                profile.createCharacterRow(JSON.parse(data));
            })
                .fail(function(data) {
                    console.log(data);

                    toaster.show(data);
                });
    },
    createCharacterRow: function (character) {
        $('#characters tr:last').after(`<tr id="character-${character.id}">` +
            `<th>${character.id}</th>` +
            `<td>${character.name}</td>` +
            `<td>${character.level}</td>` +
            `<td>${character.health_points}</td>` +
            `<td>${character.coins}</td>` +
            `<td>
                    <i class="fas fa-user-edit mr-2" onclick="profile.editCharacter(${character.id})"></i>
                    <i class="fas fa-trash ml-2" onclick="profile.deleteCharacter(${character.id})"></i>
                    </td>` +
            '</tr>');
    },
    updateUserName: function ($form, event) {
        event.preventDefault();
        const name = $form.find("input[name='name']").val();
        let userId = auth.user.id;

        if (name !== undefined)
            $.post("Services/Profile/editUserName.php", { id: userId, name: name }, function() {
                console.log("Updated");
                let cardTitle = "<h5 class=\"card-title\" id=\"username\">" + name + "</h5>";
                $form.replaceWith(cardTitle);
            })
                .fail(function(data) {
                    console.log(data);
                    toaster.show(data);
                });
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

$(document).ready(function() {
    profile.init();
});
