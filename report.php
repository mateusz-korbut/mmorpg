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
<style>
    form {
        background-color: rgb(255,255,255, 0.9);
    }
</style>
<div class="row body">

    <?php include("Layout/navbar.php");?>

    <div class="col-8 container dashboard mt-5">

        <div class="row" style="min-height: 450px">
            <div id="reportChart" class="col"></div>
        </div>

        <form>
            <div class="form-group row m-3" style="rgb(255,255,255, 0.9)">
                <h3>Change stats date range</h3>
            </div>
            <div class="form-group row mx-3">
                <label for="example-datetime-local-input" class="col-2 col-form-label">From: </label>
                <div class="col-4">
                    <input class="form-control" type="date" name="from" id="from">
                </div>
            </div>
            <div class="form-group row mx-3">
                <label for="example-datetime-local-input" class="col-2 col-form-label">To: </label>
                <div class="col-4">
                    <input class="form-control" type="date" name="to" id="to">
                </div>
            </div>
            <div class="form-group row m-3">
                <div class="col-4 m-3">
                    <input class="form-control" type="submit" value="Change">
                </div>
            </div>
        </form>

        <script src="Scripts/chart.js" defer></script>
        <script type="text/javascript" src="Scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="Scripts/jquery.canvasjs.min.js"></script>
    </div>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
