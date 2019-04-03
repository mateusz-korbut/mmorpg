<?php

require_once dirname(__FILE__) . "/../../Services/Manage/getUsers.php";

if ($result)
{
    echo "<table>
                    <tr>
                        <th>userId</th>
                        <th>userName</th>
                        <th>created</th>
                        <th>roleId</th>
                        <th>roleName</th>
                        <th>statusId</th>
                        <th>statusName</th>
                        <th>actions</th>
                    </tr>";

    while ($row = $result->fetch_object())
    {
        echo sprintf("<tr>
                        <th>%s</th>
                        <th>%s</th>
                        <th>%s</th>
                        <th>%d</th>
                        <th>%s</th>
                        <th>%d</th>
                        <th>%s</th>
                        <th><button>edit</button><button>delete</button></th>
                    </tr>",
            $row->userId,
            $row->userName,
            $row->created,
            $row->roleId,
            $row->roleName,
            $row->statusId,
            $row->statusName
        );
    }

    echo "</table>";
}
else
{
    echo "Problem with database";
}