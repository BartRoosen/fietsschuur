<?php

use Classes\FormControls\FormBuilder;

$formBuilder = new FormBuilder();
?>

<div class="modal fade extra-info-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2>Extra informatie bij fiets nr <span id="extra-info-display-id"></span></h2>
            </div>
            <div class="modal-body">
                <form action="submitForm.php?action=addExtraInfo" method="post">
                    <input type="text" name="bike_id" id="extra-info-bike-id" hidden="hidden">
                    <input type="text" name="info_id" id="extra-info-info-id" hidden="hidden">
                    <div class="form-group">
                        <label>Extra info</label>
                        <textarea class="form-control" name="info" id="extra-info-info" rows="10"></textarea>
                    </div>
                    <div class="text-right">
                        <?=
                        $formBuilder->buildButton(
                            [
                                'type'    => $formBuilder::BUTTON_TYPE_SUBMIT,
                                'class'   => 'btn btn-default',
                                'id'      => 'submitbutton',
                                'caption' => 'opslaan',
                            ]
                        );
                        ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Sluiten</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>