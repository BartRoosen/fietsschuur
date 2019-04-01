<?php

use Classes\Entities\Type;
use Classes\FormControls\FormBuilder;

$formBuilder = new FormBuilder();

?>

<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
        <h4>Type toevoegen</h4>
        <form action="submitForm.php?action=addType" method="post">
            <div class="form-group">
                <?=
                $formBuilder->buildInput(
                    [
                        'type'  => $formBuilder::INPUT_TYPE_TEXT,
                        'name'  => 'type',
                        'label' => 'Type',
                        'id'    => 'type_input'
                    ]
                )
                ?>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success" id="add_type_button">Opslaan</button>
            </div>
        </form>
    </div>
    <div class="col-xs-6">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>TYPE</th>
                <th class="text-right">ACTIE</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($types as $type): ?>
                <?php if ($type instanceof Type): ?>
                    <tr>
                        <td><?= $type->getId(); ?></td>
                        <td><?= $type->getTypeName(); ?></td>
                        <td class="text-right">
                            <a class="btn btn-xs btn-danger"
                               href="submitForm.php?action=delete&table=bike_types&id=<?= $type->getId(); ?>"
                               title="Verwijder type"
                            >
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-xs-2">
        <?php include 'components/shared/settingsMenu.php'; ?>
    </div>
    <div class="col-xs-1"></div>
</div>
