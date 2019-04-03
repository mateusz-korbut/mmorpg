<?php
echo
'<form id="'. $id .'">
    <input type="text" name="name" placeholder="Name" minlength="1">
    <input type="password" name="password" placeholder="Password" minlength="1">
    <input type="submit" value="'. $buttonText .'">
</form>';