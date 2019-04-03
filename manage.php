<?php

session_start();

$isSu = include_once "Services/Auth/isSu.php";
if (!isset($_SESSION["user"]) || !$isSu)
{
    http_response_code(403);

    die("You are not authorized");
}
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
                    users.created,
                    users.role_id AS roleId,
                    roles.name AS roleName,
                    users.status_id AS statusId,
                    statuses.name AS statusName
                FROM users
                JOIN roles
                ON users.role_id = roles.id
                JOIN statuses
                ON users.status_id = statuses.id;";

        if ($result = $connection->query($query))
        {
            while ($row = $result->fetch_object())
            {
                echo json_encode($row) . "<br>";
            }
            http_response_code(200);
        }
        echo $connection->error;

        $connection->close();?>
    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
