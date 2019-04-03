<navbar>
    <h1>MMO users manager</h1>

    <?php if (isset($_SESSION["user"])): ?>
        <button id="logoutBtn">Logout</button>

        <script src="Scripts/auth.js"></script>
        Welcome <a href="profile.php"><span id="username"></span></a>
        <script>auth.init(<?php echo $_SESSION["user"]; ?>)</script>
    <?php endif; ?>
    <a href="leaderboard.php">leaderboard</a>
    <?php if (isset($_SESSION["user"])): ?>
        <?php
            $isSu = include_once "Services/Auth/isSu.php";
            if ($isSu):?>
        <a href="manage.php">manage</a>
        <?php endif; ?>
    <?php endif; ?>
</navbar>