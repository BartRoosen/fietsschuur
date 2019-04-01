<?php

use Classes\Entities\Bike;
use Classes\FormControls\FormBuilder;

$fb = new FormBuilder();
?>

<div class="loading">
    <i class="fas fa-spinner fa-spin"></i>
    <br>Gegevens worden opgehaald...
</div>
<div class="page-content">
    <div class="text-right">
        <button class="btn btn-warning"
                data-toggle="modal"
                data-target=".editForm"
                title="Wijzig gegevens"
        >
            <i class="fas fa-plus"></i> Fiets toevoegen
        </button>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Prijs</th>
            <th>Verkocht</th>
            <th>Datum verkoop</th>
            <th>Gender</th>
            <th>
                Type
                <div class="right-floater">
                    <a href="navController.php?page=type" title="Types">
                        <i class="fas fa-plus green"></i>
                    </a>
                </div>
            </th>
            <th>
                Merk
                <div class="right-floater">
                    <a href="navController.php?page=brand" title="Fietsmerken">
                        <i class="fas fa-plus green"></i>
                    </a>
                </div>
            </th>
            <th>
                Frame
                <div class="right-floater">
                    <a href="navController.php?page=frame" title="Framematen">
                        <i class="fas fa-plus green"></i>
                    </a>
                </div>
            </th>
            <th>
                Wiel
                <div class="right-floater">
                    <a href="navController.php?page=wheel" title="Wielmaten">
                        <i class="fas fa-plus green"></i>
                    </a>
                </div>
            </th>
            <th>Zichtbaar</th>
            <th>Extra info</th>
            <th class="text-right fixed-width">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bikes as $bike): ?>
            <?php if ($bike instanceof Bike): ?>
                <form action="submitForm.php?action=addBike" method="post">
                    <input type="text" name="id" value="<?= $bike->getId(); ?>" hidden>
                    <tr data-id="<?= $bike->getId(); ?>" id="<?= $bike->getId(); ?>">
                        <td><?= $bike->getId(); ?></td>
                        <td>
                            <?=
                            $fb->buildInput(
                                [
                                    'type'  => $fb::INPUT_TYPE_TEXT,
                                    'value' => $bike->getPrice(),
                                    'class' => [
                                        'small-input',
                                        'change_trigger',
                                        'price'
                                    ],
                                    'name'  => 'price',
                                ]
                            );
                            ?>
                        </td>
                        <td class="text-center">
                            <?php if ($bike->isSold()): ?>
                                <i class="fas fa-check green"></i>
                            <?php else: ?>
                                <i class="fas fa-times red"></i>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?=
                            $fb->buildInput(
                                [
                                    'type'  => $fb::INPUT_TYPE_DATE,
                                    'value' => null === $bike->getSellDate()
                                        ? ''
                                        : date('Y-m-d', strtotime($bike->getSellDate())),
                                    'class' => ['change_trigger', 'date'],
                                    'name'  => 'sellDate',
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?=
                            $fb->buildSelect(
                                [
                                    'name'          => 'gender',
                                    'options'       => $dropDownRepo->getGenders(),
                                    'selected'      => $bike->getGenderId(),
                                    'dataAttribute' => [
                                        'key'   => 'id',
                                        'value' => $bike->getId(),
                                    ],
                                    'class'         => ['changeGender', 'gender', 'change_trigger'],
                                    'empty_option'  => true,
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?=
                            $fb->buildSelect(
                                [
                                    'name'          => 'type',
                                    'options'       => $dropDownRepo->getTypes(),
                                    'selected'      => $bike->getTypeId(),
                                    'dataAttribute' => [
                                        'key'   => 'id',
                                        'value' => $bike->getId(),
                                    ],
                                    'class'         => ['changeType', 'change_trigger', 'type'],
                                    'empty_option'  => true,
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?=
                            $fb->buildSelect(
                                [
                                    'name'          => 'brand',
                                    'options'       => $dropDownRepo->getBrands(),
                                    'selected'      => $bike->getBrandId(),
                                    'dataAttribute' => [
                                        'key'   => 'id',
                                        'value' => $bike->getId(),
                                    ],
                                    'class'         => ['changeBrand', 'change_trigger', 'brand'],
                                    'empty_option'  => true,
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?=
                            $fb->buildSelect(
                                [
                                    'name'          => 'frameSize',
                                    'options'       => $dropDownRepo->getFrameSizes(),
                                    'selected'      => $bike->getSizeFrameId(),
                                    'dataAttribute' => [
                                        'key'   => 'id',
                                        'value' => $bike->getId(),
                                    ],
                                    'class'         => ['changeFrameSize', 'change_trigger', 'frame'],
                                    'empty_option'  => true,
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?=
                            $fb->buildSelect(
                                [
                                    'name'          => 'wheelSize',
                                    'options'       => $dropDownRepo->getWheelSizes(),
                                    'selected'      => $bike->getSizeWheelId(),
                                    'dataAttribute' => [
                                        'key'   => 'id',
                                        'value' => $bike->getId(),
                                    ],
                                    'class'         => ['changeWheelSize', 'change_trigger', 'wheel'],
                                    'empty_option'  => true,
                                ]
                            );
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="submitForm.php?action=toggleVisibility&id=<?= $bike->getId(
                            ); ?>&isvisible=<?= $bike->isDisplay(); ?>">
                                <?php if ($bike->isDisplay()): ?>
                                    <i class="fas fa-check green"></i>
                                <?php else: ?>
                                    <i class="fas fa-times red"></i>
                                <?php endif; ?>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-default extra-info-button"
                                    data-toggle="modal"
                                    data-target=".extra-info-modal"
                                    title="Extra info"
                                    data-bikeid="<?= $bike->getId(); ?>"
                                    data-info="<?= $bike->getExtraInfo(); ?>"
                                    data-infoid="<?= $bike->getExtraInfoId(); ?>"
                            >
                                <?php if (null === $bike->getExtraInfo()): ?>
                                    <i class="fas fa-plus"></i> Toevoegen
                                <?php else: ?>
                                    <i class="fas fa-edit"></i> Wijzigen
                                <?php endif; ?>
                            </button>

                        </td>
                        <td class="text-right">
                            <button class="btn btn-xs btn-success save-button hidden-button"
                                    type="submit"
                                    data-id="<?= $bike->getId(); ?>"
                                    id="save_button_id_<?= $bike->getId(); ?>"
                                    title="Opslaan"
                            >
                                <i class="fas fa-save"></i>
                            </button>
                            <button class="btn btn-xs btn-warning undo-button hidden-button"
                                    data-id="<?= $bike->getId(); ?>"
                                    id="undo_button_id_<?= $bike->getId(); ?>"
                                    title="Maak ongedaan"
                            >
                                <i class="fas fa-undo"></i>
                            </button>
                            <a class="btn btn-xs btn-danger"
                               href="submitForm.php?action=delete&table=bikes&id=<?= $bike->getId(); ?>"
                               id="delete_button_id_<?= $bike->getId(); ?>"
                               title="Verwijder fiets"
                            >
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
