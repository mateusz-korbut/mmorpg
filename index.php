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

<?php include("Layout/navbar.php");?>

<div class="container">

    <main>

    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
