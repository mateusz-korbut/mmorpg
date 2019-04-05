<?php

require_once dirname(__FILE__) . "/../../Services/Profile/getUserCharacters.php";

?>

<table class="table mt-3 text-center">
    <thead>
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
                <i class="fas fa-trash ml-2" onclick="profile.deleteCharacter(<?=$character->id;?>)"></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
