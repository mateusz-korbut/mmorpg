<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>
    <link rel="stylesheet" href="Styles/leaderboard.css">

    <script src="Scripts/profile.js" defer></script>

</head>
<body class="background-img">
<div class="row body">

    <?php include("Layout/navbar.php");?>

    <div class="col-8 container dashboard align-self-center">
        <?php include("Templates/userSearchResult.php"); ?>
    </div>

    <?php include("Layout/footer.php");?>

</div>
</div>
</body>
</html>
