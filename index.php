<?php

    include 'Utils/databaseConnection.php';
    $connection->close();
    session_start();

    include "Entities/Characters/Race.php";

    use entities\Characters\Race;
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
        <?php if (isset($_SESSION["user"])): ?>
            <div class="row mt-2 justify-content-center">
                <div class="col-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="card-title">Your characters stats</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col chart">
                    <div id="levelsChart"></div>
                </div>
                <div class="col chart">
                    <div id="coinsChart"></div>
                </div>
            </div>
            <div class="row">
                <div class="col chart">
                    <div id="healthChart"></div>
                </div>
                <div class="col chart">
                    <div id="raceChart"></div>
                </div>
            </div>
            <script src="Scripts/chart.js" defer></script>
            <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
            <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<!--            <div class="row">-->
<!--                Create new character:-->
<!--                <form id="characterForm">-->
<!--                    <input name="name" type="text" minlength="1" maxlength="25">-->
<!--                    <select name="raceId">-->
<!--                        --><?php
//                        echo "<option value='". Race::Human ."'>Human</option>";
//                        echo "<option value='". Race::Elf ."'>Elf</option>";
//                        echo "<option value='". Race::Dwarf ."'>Dwarf</option>";
//                        echo "<option value='". Race::Orc ."'>Orc</option>";
//                        ?>
<!--                    </select>-->
<!--                    <input type="submit" value="Create">-->
<!--                </form>-->
<!--            </div>-->
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
