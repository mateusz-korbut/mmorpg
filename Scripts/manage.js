let manage = {
    prevRole: null,
    prevStatus: null,
    select: null,
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
};
