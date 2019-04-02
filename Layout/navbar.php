<header>
    <h1>MMO users manager</h1>

    <?php if (isset($_SESSION["user"])): ?>
        <button id="logoutBtn">Logout</button>

        <script src="Scripts/auth.js"></script>
        Welcome <span id="username"></span>
        <script>auth.init(<?php echo $_SESSION["user"]; ?>)</script>
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
</header>
<?php

