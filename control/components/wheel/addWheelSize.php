<?php

use Classes\FormControls\FormBuilder;

$fb = new FormBuilder();
?>
<h4>Wielmaat toevoegen</h4>
<form action="submitForm.php?action=addSetting&table=size_wheel" method="post">
    <div class="form-group">
        <?=
        $fb->buildInput(
            [
                'label' => 'Wielmaat',
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