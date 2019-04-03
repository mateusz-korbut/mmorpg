<?php

require_once dirname(__FILE__) . "/../../Services/Leaderboard/getMostLeveledUsers.php";

if ($result)
{
    echo "<table>
                    <tr>
                        <th>userId</th>
                        <th>userName</th>
                        <th>gainedLevels</th>
                    </tr>";

    while ($row = $result->fetch_object())
    {
        echo sprintf("<tr>
                        <th>%s</th>
                        <th>%s</th>
                        <th>%d</th>
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