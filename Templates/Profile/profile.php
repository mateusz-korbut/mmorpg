<?php

require_once dirname(__FILE__) . "/../../Services/Profile/getUser.php";
require_once dirname(__FILE__) . "/../../Services/Profile/getUserCharacters.php";
require_once dirname(__FILE__) . "/../../Templates/newCharacterModal.php";

if ($result && $characters)
{
    $user = $result->fetch_object();
}
else
{
    die("Problem with database");
}
?>

<table class="table">
    <thead>
    <tr>
        <td colspan="6">
            <button class="btn" data-toggle="modal" data-target="#charCreatorModal">
                Add new character <i class="fas fa-plus-square"></i>
            </button>
        </td>
    </tr>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Level</th>
            <th>Health points</th>
            <th>Coins</th>
            <th>Actions</th>
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
            <td>
                <i class="fas fa-user-edit mr-2" onclick="profile.editCharacter(<?=$character->id;?>)"></i>
                <i class="fas fa-trash ml-2" onclick="profile.deleteCharacter(<?=$character->id;?>)"></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
