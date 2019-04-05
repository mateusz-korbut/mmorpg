<?php

require_once dirname(__FILE__) . "/../../Services/Manage/getUsers.php";
require_once dirname(__FILE__) . "/../../Entities/Users/Role.php";
require_once dirname(__FILE__) . "/../../Entities/Users/Status.php";

use entities\Users\Role;
use entities\Users\Status;

?>

<table class="table mt-3 text-center">
    <thead>
    <tr>
        <td colspan="6">
            <h3>Users</h3>
        </td>
    </tr>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody id="users">
    <?php foreach($users as $user): ?>
        <tr id="user-<?=$user->userId?>">
            <th><?=$user->id;?></th>
            <td><?=$user->name;?></td>
            <td><?=$user->created;?></td>
            <td>
                <select class="form-control"
                        onfocus="manage.prevRole = $(this).val()"
                        onchange="manage.updateRole($( this ), <?=$user->id;?>)">
                    <?php
                        echo "<option ";
                        if(Role::Admin == $user->roleId)
                            echo "selected";
                        echo " value=" . Role::Admin . ">Admin</option>";

                        echo "<option ";
                        if(Role::Moderator == $user->roleId)
                            echo "selected";
                        echo " value=" . Role::Moderator . ">Moderator</option>";

                        echo "<option ";
                        if(Role::User == $user->roleId)
                            echo "selected";
                        echo " value=" . Role::User . ">User</option>";
                    ?>
                </select>
            </td>
            <td>
                <select class="form-control"
                        onfocus="manage.prevStatus = $(this).val()"
                        onchange="manage.updateStatus($( this ), <?=$user->id;?>)">
                    <?php
                    echo "<option ";
                    if(Status::Active == $user->statusId)
                        echo "selected";
                    echo " value=" . Status::Active . ">Active</option>";

                    echo "<option ";
                    if(Status::Blocked == $user->statusId)
                        echo "selected";
                    echo " value=" . Status::Blocked . ">Blocked</option>";
                    ?>
                </select>
            </td>
            <td>
                <i class="fas fa-trash ml-2" onclick="auth.deleteUser(<?=$user->id;?>)"></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
