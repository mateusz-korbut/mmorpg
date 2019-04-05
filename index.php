<?php

    include 'Utils/databaseConnection.php';
    $connection->close();
    session_start();


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>
    <script src="Scripts/index.js" defer></script>
    <link rel="stylesheet" href="Styles/index.css">
</head>
<body class="background-img">
<div class="row body">

    <?php include("Layout/navbar.php");?>

    <div class="col-8 container dashboard">
        <?php if (isset($_SESSION["user"])): include_once "Templates/Index/charts.php"?>
        <?php else:
            $id = "loginForm";
            $buttonText = "Login";
            include "Templates/Index/logregForm.php";
            $id = "registerForm";
            $buttonText = "Register";
            include "Templates/Index/logregForm.php";
        endif; ?>
    </div>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
