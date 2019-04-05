<?php

require_once dirname(__FILE__) . "/../../Services/Manage/getUsers.php";

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
            <td><?=$user->roleName;?></td>
            <td><?=$user->statusName;?></td>
            <td>
                <i class="fas fa-user-edit mr-2" onclick="profile.editCharacter(<?=$user->id;?>)"></i>
                <i class="fas fa-trash ml-2" onclick="profile.deleteCharacter(<?=$user->id;?>)"></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<form>

</form>