<div class="col-2 pl-4 sidebar" style="background-color: white">
<div class="row my-2">
    <div class="col">
        <h1 class="text-center"><a href="./">MMO users manager</a></h1>
    </div>
</div>
<?php if (isset($_SESSION["user"])): ?>
    <div class="row my-2">
        <div class="col">
            <div class="card">
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
    <a class="btn btn-outline-primary my-2" href="./">
        <div class="row">
            <div class="col">
                Home
            </div>
        </div>
    </a>
    <a class="btn btn-outline-primary my-2" href="leaderboard.php">
        <div class="row">
            <div class="col">
                Leaderboard
            </div>
        </div>
    </a>
<?php if (isset($_SESSION["user"])): ?>
    <?php
            $isSu = include_once "Services/Auth/isSu.php";
            if ($isSu):?>
                <a class="btn btn-outline-primary my-2" href="manage.php">
                    <div class="row">
                        <div class="col">
                            Manage
                        </div>
                    </div>
                </a>
        <?php endif; ?>
    <?php endif; ?>
</navbar>
</div>
