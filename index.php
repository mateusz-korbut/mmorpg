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
</head>
<body>
<div class="container">

    <header>
        <h1>MMO users manager</h1>
    </header>

    <main>
        <?php if (isset($_SESSION["user"])): ?>

        <?php else:
            $id = "loginForm";
            $buttonText = "Login";
            include "Templates/Index/logregForm.php";
            $id = "registerForm";
            $buttonText = "Register";
            include "Templates/Index/logregForm.php";
        endif; ?>
    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
