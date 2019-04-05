let manage = {
    prevRole: null,
    prevStatus: null,
    select: null,
    updateRole: function (select, id) {
    },
    updateStatus: function (select, userId) {
        event.preventDefault();
        manage.select = select;
        const statusId = select.val();

        $.post("Services/Manage/changeUserRole.php", { statusId: statusId, userId: userId}, function() {
            console.log("Updated");
        })
            .fail(function(data) {
                toaster.show(data);
                manage.select.val(manage.prevStatus);
            });
    },
};
