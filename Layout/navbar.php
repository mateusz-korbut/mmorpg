<navbar>
    <h1>MMO users manager</h1>

    <?php if (isset($_SESSION["user"])): ?>
        <button id="logoutBtn">Logout</button>

        <script src="Scripts/auth.js"></script>
        Welcome <span id="username"></span>
        <script>auth.init(<?php echo $_SESSION["user"]; ?>)</script>
    <?php endif; ?>
</navbar>
<?php

