<?php

$user= require_once dirname(__FILE__) . "/../../Services/Profile/getUser.php";
require_once dirname(__FILE__) . "/../../Services/Profile/getUserCharacters.php";
require_once dirname(__FILE__) . "/../../Templates/newCharacterModal.php";

?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?=$user->userName?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?=$user->created?></h6>
        <p class="card-text">Role: <?=$user->roleName?><br>Account status: <?=$user->statusName?></p>
        <a href="#" class="card-link">Edit</a>
        <a href="#" class="card-link btn-outline-danger">Delete</a>
    </div>
</div>

<table class="table mt-3">
    <thead>
        <tr>
            <td colspan="6">
                <div class="row">
                    <h3 class="col text-center pl-5">Your characters</h3>
                    <button class="btn col-2" data-toggle="modal" data-target="#charCreatorModal">
                        Add new character <i class="fas fa-plus-square"></i>
                    </button>
                </div>
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
