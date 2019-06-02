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
    <script src="Scripts/report.js" defer></script>
</head>
<body class="background-img">
<div class="row body">

    <?php include("Layout/navbar.php");?>

    <div class="col-8 container dashboard mt-5">
        <div id="reportChart"></div>
        <script src="Scripts/chart.js" defer></script>
        <script type="text/javascript" src="Scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="Scripts/jquery.canvasjs.min.js"></script>
    </div>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
