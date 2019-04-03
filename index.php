<?php

    include 'Utils/databaseConnection.php';
    $connection->close();
    session_start();

    include "Entities/Characters/Race.php";

    use entities\Characters\Race;
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("Layout/head.php"); ?>
    <script src="Scripts/index.js" defer></script>
</head>
<body>

<?php include("Layout/navbar.php");?>

<div class="container">

    <main>
        <?php if (isset($_SESSION["user"])): ?>
            You have: <span id="quantityCharacters"></span> characters<br>
            You have: <span id="coins"></span> coins<br>
            Max character level: <span id="maxLevel"></span><br>
            Favourite race: <span id="favouriteRace"></span><br>
            Create new character:
            <form id="characterForm">
                <input name="name" type="text" minlength="1" maxlength="25">
                <select name="raceId">
                    <?php
                        echo "<option value='". Race::Human ."'>Human</option>";
                        echo "<option value='". Race::Elf ."'>Elf</option>";
                        echo "<option value='". Race::Dwarf ."'>Dwarf</option>";
                        echo "<option value='". Race::Orc ."'>Orc</option>";
                    ?>
                </select>
                <input type="submit" value="Create">
            </form>
        <?php else:
            $id = "loginForm";
            $buttonText = "Login";
            include "Templates/Index/logregForm.php";
            $id = "registerForm";
            $buttonText = "Register";
            include "Templates/Index/logregForm.php";
        endif; ?>
    </main>

    <?php include("Layout/footer.php");?>

</div>
</body>
</html>
