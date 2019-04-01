<?php
use Classes\Entities\FrameSize;
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>FRAMEMAAT</th>
        <th>ACTIE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($frameSizes as $size): ?>
        <?php if ($size instanceof FrameSize): ?>
            <tr>
                <td><?= $size->getId() ?></td>
                <td><?= $size->getSize() ?></td>
                <td class="text-right">
                    <a class="btn btn-xs btn-danger"
                       href="submitForm.php?action=delete&table=size_frame&id=<?= $size->getId(); ?>"
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