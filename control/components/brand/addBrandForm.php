<?php

use Classes\FormControls\FormBuilder;

$fb = new FormBuilder();
?>
<h4>Merk toevoegen</h4>
<form action="submitForm.php?action=addSetting&table=brands" method="post">
    <div class="form-group">
        <?=
        $fb->buildInput(
            [
                'label' => 'Merk',
                'name'  => 'value',
                'type'  => $fb::INPUT_TYPE_TEXT,
            ]
        );
        ?>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-success">Opslaan</button>
    </div>
</form>