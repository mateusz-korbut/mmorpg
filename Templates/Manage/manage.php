<?php

require_once dirname(__FILE__) . "/../../Services/Manage/getUsers.php";
require_once dirname(__FILE__) . "/../../Entities/Users/Role.php";
require_once dirname(__FILE__) . "/../../Entities/Users/Status.php";

use entities\Users\Role;
use entities\Users\Status;

$isAdmin = json_decode($_SESSION["user"])->role_id == Role::Admin;

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
                <?php if ($isAdmin): ?>
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
                <?php else:
                    echo "<p>";
                    if(Role::Admin == $user->roleId) {
                        echo "Admin";
                    }
                    if(Role::Moderator == $user->roleId) {
                        echo "Moderator";
                    }
                    if(Role::User == $user->roleId) {
                        echo "User";
                    }
                    echo "</p>";

                    endif
                ?>
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
                    <i class="fas fa-user-edit mr-2" onclick="manage.displayUserCharacters(<?=$user->id;?>, '<?=$user->name;?>')"></i>
                    <?php if ($isAdmin): ?>
                        <i class="fas fa-trash ml-2" onclick="auth.deleteUser(<?=$user->id;?>)"></i>
                    <?php endif; ?>
                </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="userCharacters" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="charactersCreatorName"></span> characters</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="userCharactersTable">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="manage.saveChanges()">Save</button>
            </div>
        </div>
    </div>
</div>
