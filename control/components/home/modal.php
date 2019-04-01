<?php

use Classes\FormControls\FormBuilder;

$formBuilder = new FormBuilder();
?>

<div class="modal fade editForm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2>Fiets gegevens</h2>
            </div>
            <div class="modal-body">
                <form action="submitForm.php?action=addBike" method="post">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <?=
                                $formBuilder->buildInput(
                                    [
                                        'type'  => $formBuilder::INPUT_TYPE_TEXT,
                                        'name'  => 'price',
                                        'label' => 'Prijs',
                                    ]
                                )
                                ?>
                            </div>

                            <div class="form-group">
                                <?=
                                $formBuilder->buildInput(
                                    [
                                        'type'  => $formBuilder::INPUT_TYPE_DATE,
                                        'name'  => 'sellDate',
                                        'label' => 'Datum verkoop',
                                    ]
                                );
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <?=
                                $formBuilder->buildSelect(
                                    [
                                        'name'         => 'gender',
                                        'options'      => $dropDownRepo->getGenders(),
                                        'label'        => 'Gender',
                                        'empty_option' => true,
                                    ]
                                );
                                ?>
                            </div>
                            <div class="form-group">
                                <?=
                                $formBuilder->buildSelect(
                                    [
                                        'name'         => 'type',
                                        'options'      => $dropDownRepo->getTypes(),
                                        'label'        => 'Type',
                                        'empty_option' => true,
                                    ]
                                );
                                ?>
                            </div>
                            <div class="form-group">
                                <?=
                                $formBuilder->buildSelect(
                                    [
                                        'name'         => 'brand',
                                        'options'      => $dropDownRepo->getBrands(),
                                        'label'        => 'Merk',
                                        'empty_option' => true,
                                    ]
                                );
                                ?>
                            </div>
                            <div class="form-group">
                                <?=
                                $formBuilder->buildSelect(
                                    [
                                        'name'         => 'frameSize',
                                        'options'      => $dropDownRepo->getFrameSizes(),
                                        'label'        => 'Framemaat',
                                        'empty_option' => true,
                                    ]
                                );
                                ?>
                            </div>
                            <div class="form-group">
                                <?=
                                $formBuilder->buildSelect(
                                    [
                                        'name'         => 'wheelSize',
                                        'options'      => $dropDownRepo->getWheelSizes(),
                                        'label'        => 'Wielmaat',
                                        'empty_option' => true,
                                    ]
                                );
                                ?>
                            </div>
                        </div>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>