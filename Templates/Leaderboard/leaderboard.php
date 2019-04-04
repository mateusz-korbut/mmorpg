<?php

require_once dirname(__FILE__) . "/../../Services/Leaderboard/getMostLeveledUsers.php";

if ($result)
{
    echo "<table class=\"table mb-5\">
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>Username</th>
                        <th>Gained levels</th>
                    </tr>
                </thead>";
                    

    while ($row = $result->fetch_object())
    {
        echo sprintf("<tr>
                        <th>%d</th>
                        <td>%s</td>
                        <td>%d</td>
                    </tr>",
            $row->userId,
            $row->userName,
            $row->gainedLevels
        );
    }

    echo "</table>";
}
else
{
    echo "Problem with database";
}