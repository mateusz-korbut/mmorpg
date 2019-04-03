<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>
</head>
<body>

<?php include("Layout/navbar.php");?>

<div class="container">

    <main>
        <?php

        http_response_code(400);

        require_once "Utils/databaseConnection.php";

        $query="SELECT
                    users.id AS userId,
                    users.name AS userName,
                    SUM(level) AS gainedLevels
                FROM users
                JOIN users_characters
                ON users.id = users_characters.user_id
                JOIN characters
                ON characters.id = users_characters.character_id
                GROUP BY userId
                ORDER BY gainedLevels DESC
                LIMIT 10;";

        if ($result = $connection->query($query))
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
            http_response_code(200);

            echo "</table>";
        }
        else
        {
            echo $connection->error;
        }

        $connection->close();?>
    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
