<?php

require_once dirname(__FILE__) . "/../../Services/Leaderboard/getMostLeveledUsers.php";

if ($result):
?>
    <table class="table mb-5 text-center">
        <thead>
            <tr>
                <th>User id</th>
                <th>Username</th>
                <th>Gained levels</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_object()): ?>
            <tr>
                <th><?=$row->userId?></th>
                <th><?=$row->userName?></th>
                <th><?=$row->gainedLevels?></th>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
<h1>Problem with database</h1>
<?php endif; ?>
