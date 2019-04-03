<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>
</head>
<body>

<?php include("Layout/navbar.php");?>

<div class="container">

    <main>
        <?php include("Templates/Leaderboard/leaderboard.php"); ?>
    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
