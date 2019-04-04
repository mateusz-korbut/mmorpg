let profile = {
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
            profile.update(form, event, id);
        });

        span.replaceWith(form);
    },
    update: function ($form, event, id) {
        event.preventDefault();
        const name = $form.find("input[name='name']").val();

        if (name !== undefined && name !== undefined)
            $.post("Services/editCharacterName.php", { id: id, name: name }, function() {
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

    },
};