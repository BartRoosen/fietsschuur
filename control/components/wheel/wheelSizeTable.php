<?php
use Classes\Entities\WheelSize;
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>WIELMAAT</th>
        <th>ACTIE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($wheelSizes as $size): ?>
        <?php if ($size instanceof WheelSize): ?>
            <tr>
                <td><?= $size->getId() ?></td>
                <td><?= $size->getSize() ?></td>
                <td class="text-right">
                    <a class="btn btn-xs btn-danger"
                       href="submitForm.php?action=delete&table=size_wheel&id=<?= $size->getId(); ?>"
                       title="Verwijder maat"
                    >
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>