<?php

require_once dirname(__FILE__) . "/../../Services/Profile/getUserCharacters.php";

$permissionToEdit = true;
if (isset($_GET['id']))
{
    $permissionToEdit = false;
}

?>

<table class="table mt-3 text-center">
    <thead>
    <tr>
        <td colspan="6">
            <div class="row">
                <?php if ($permissionToEdit): ?>
                    <h3 class="col text-center pl-5">Your characters</h3>
                    <button class="btn col-2" data-toggle="modal" data-target="#charCreatorModal">
                        Add new character <i class="fas fa-plus-square"></i>
                    </button>
                <?php else: ?>
                    <h3 class="col text-center pl-5">Characters</h3>
                <?php endif; ?>
            </div>
        </td>
    </tr>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Level</th>
        <th>Health points</th>
        <th>Coins</th>
        <?php if ($permissionToEdit): ?>
            <th>Actions</th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody id="characters">
    <?php foreach($characters as $character): ?>
        <tr id="character-<?=$character->id?>">
            <th><?=$character->id;?></th>
            <td><span id="name-<?=$character->id;?>"><?=$character->name;?></span></td>
            <td><?=$character->level;?></td>
            <td><?=$character->health_points;?></td>
            <td><?=$character->coins;?></td>
            <?php if ($permissionToEdit): ?>
                <td>
                    <i class="fas fa-user-edit mr-2" onclick="profile.editCharacter(<?=$character->id;?>)"></i>
                    <i class="fas fa-trash ml-2" onclick="auth.deleteCharacter(<?=$character->id;?>)"></i>
                </td>
            <?php endif; ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
