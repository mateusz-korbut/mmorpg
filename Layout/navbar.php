<div class="row">
    <div class="col">
        <h1 class="text-center">MMO users manager</h1>
    </div>
</div>
<?php if (isset($_SESSION["user"])): ?>
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <script src="Scripts/auth.js"></script>
                    </button>
                    <h5 class="card-title">Welcome <a href="profile.php"><span id="username"></span></a></h5>
                    <button id="logoutBtn" class="btn btn-outline-secondary">Logout</button>

                    <script>auth.setUser(<?php echo $_SESSION["user"]; ?>)</script>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col">
        <a class="btn btn-outline-primary" href="leaderboard.php">Leaderboard</a>
    </div>
</div>
<?php if (isset($_SESSION["user"])): ?>
    <?php
            $isSu = include_once "Services/Auth/isSu.php";
            if ($isSu):?>
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-primary" href="manage.php">Manage</button>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</navbar>