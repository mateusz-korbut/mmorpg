<form id="characterForm">
    <input name="name" type="text" minlength="1" maxlength="25">
    <select name="raceId">
        <?php
        include "Entities/Characters/Race.php";

        use entities\Characters\Race;

        echo "<option value='". Race::Human ."'>Human</option>";
        echo "<option value='". Race::Elf ."'>Elf</option>";
        echo "<option value='". Race::Dwarf ."'>Dwarf</option>";
        echo "<option value='". Race::Orc ."'>Orc</option>";
        ?>
    </select>
    <input type="submit" value="Create">
</form>

<script>
    $("#characterForm").submit(function(event) {
        event.preventDefault();
        const $form = $( this );
        const name = $form.find("input[name='name']").val();
        const raceId = $form.find("select[name='raceId']").val();

        if (name !== undefined && raceId !== undefined)
            $.post("createCharacter.php", { name: name, raceId: raceId }, function(data) {
                console.log(data);
                toaster.show(data);
            })
                .fail(function(data) {
                    console.log(data);

                    toaster.show(data);
                });
    });
</script>