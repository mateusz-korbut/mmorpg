<?php

require_once dirname(__FILE__) . "/../../Services/Leaderboard/getMostLeveledUsers.php";

if ($result):
?>
    <table class="table mb-5 text-center">
        <thead>
            <tr>
                <td colspan="4">
                    <h3>Leaderboard</h3>
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>User id</th>
                <th>Username</th>
                <th>Gained levels</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1;
            while($row = $result->fetch_object()): ?>
            <tr onclick="document.location.href = 'profile.php?id=<?=$row->userId?>'">
                <th><b><?php echo $i; $i++;?></b></th>
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
