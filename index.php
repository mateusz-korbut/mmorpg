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
        <button id="logoutBtn">Logout</button>

        <?php if (isset($_SESSION["user"])): ?>
            <?php echo $_SESSION["user"]; ?>
        <?php else: ?>
            <form id="loginForm">
                <input type="text" name="name" placeholder="Name">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Login">
            </form>
            <form id="registerForm">
                <input type="text" name="name" placeholder="Name" minlength="1">
                <input type="password" name="password" placeholder="Password" minlength="1">
                <input type="submit" value="Register">
            </form>
        <?php endif; ?>
    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
