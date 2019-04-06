<?php

$user= require_once dirname(__FILE__) . "/../../Services/Profile/getUser.php";
require_once dirname(__FILE__) . "/../../Templates/newCharacterModal.php";

?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title" id="profileName"><?=$user->userName?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?=$user->created?></h6>
        <p class="card-text">Role: <?=$user->roleName?><br>Account status: <?=$user->statusName?></p>
        <a href="#" class="card-link" id="editUsername">Edit</a>
        <a href="#" class="card-link btn-outline-danger">Delete</a>
    </div>
</div>

<?php
    include_once dirname(__FILE__) . "/../../Templates/Profile/userCharacters.php";
?>