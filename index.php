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

    <div class="col-2 container dashboard align-self-center mb-5">
        <div class="card text-center">
            <div class="card-body">
                <form id="loginForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" minlength="1">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" minlength="1">
                    </div>
                </form>
            </div>
            <div class="card-footer mt-2">
                <input class="btn btn-outline-primary" type="submit" value="Register">
                <button class="btn btn-outline-primary">Login</button>
            </div>
        </div>
    </div>


    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
