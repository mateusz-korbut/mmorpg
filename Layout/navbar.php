<navbar>
    <h1>MMO users manager</h1>

    <?php if (isset($_SESSION["user"])): ?>
        <button id="logoutBtn">Logout</button>

        <script src="Scripts/auth.js"></script>
        Welcome <a href="profile.php"><span id="username"></span></a>
        <script>auth.init(<?php echo $_SESSION["user"]; ?>)</script>
    <?php endif; ?>
    <a href="leaderboard.php">leaderboard</a>
    <a href="shop.php">shop</a>
    <?php if (isset($_SESSION["user"])):
        include "Utils/isSU.php";?>
        <a href="manage.php">manage</a>
    <?php endif; ?>
</navbar>