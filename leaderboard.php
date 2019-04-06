<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>

    <link rel="stylesheet" href="Styles/leaderboard.css">
</head>
<body class="background-img">
<div class="row body">

    <?php include("Layout/navbar.php");?>

    <div class="col-8 container dashboard align-self-center mb-5">
        <?php include("Templates/Leaderboard/leaderboard.php"); ?>
    </div>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
