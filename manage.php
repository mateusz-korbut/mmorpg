<?php

session_start();

$isSu = include_once "Services/Auth/isSu.php";
if (!isset($_SESSION["user"]) || !$isSu)
{
    http_response_code(403);

    die("You are not authorized");
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>
    <link rel="stylesheet" href="Styles/leaderboard.css">

    <script src="Scripts/manage.js" defer></script>

</head>
<body class="background-img">
<div class="row body">

    <?php include("Layout/navbar.php");?>

    <div class="col-8 container dashboard align-self-center">
        <?php include("Templates/Manage/manage.php"); ?>
    </div>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
