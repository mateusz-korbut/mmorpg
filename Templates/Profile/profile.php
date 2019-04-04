<?php

require_once dirname(__FILE__) . "/../../Services/Profile/getUser.php";
require_once dirname(__FILE__) . "/../../Services/Profile/getUserCharacters.php";

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
            <th>Id</th>
            <th>Name</th>
            <th>Level</th>
            <th>Health points</th>
            <th>Coins</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($characters as $character): ?>
        <tr>
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
