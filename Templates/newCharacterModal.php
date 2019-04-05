<?php
require_once dirname(__FILE__) . "/../Entities/Characters/Race.php";

use entities\Characters\Race;
?>

<div class="modal fade" id="charCreatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new character</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="characterForm">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" minlength="1" maxlength="25" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputRace" class="col-sm-2 col-form-label">Race</label>
                        <div class="col-sm-10">
                            <select name="raceId" class="form-control">
                                <?php
                                echo "<option value='". Race::Human ."'>Human</option>";
                                echo "<option value='". Race::Elf ."'>Elf</option>";
                                echo "<option value='". Race::Dwarf ."'>Dwarf</option>";
                                echo "<option value='". Race::Orc ."'>Orc</option>";
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="createCharacter">Create</button>
            </div>
        </div>
    </div>
</div>
