<?php

require_once dirname(__FILE__) . "/../Services/User/findUsers.php";

if ($result):
?>
    <table class="table mb-5 text-center">
        <thead>
            <tr>
                <td colspan="3">
                    <h3>Result</h3>
                </td>
            </tr>
            <tr>
                <th>User id</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_object()): ?>
            <tr onclick="document.location.href = 'profile.php?id=<?=$row->id?>'">
                <th><?=$row->id?></th>
                <th><?=$row->name?></th>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <h1>Problem with database</h1>
<?php endif; ?>
