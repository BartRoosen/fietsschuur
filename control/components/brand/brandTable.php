<?php
use Classes\Entities\Brand;
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>MERK</th>
        <th>ACTIE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($brands as $brand): ?>
        <?php if ($brand instanceof Brand): ?>
        <tr>
            <td><?= $brand->getId(); ?></td>
            <td><?= $brand->getBrandName(); ?></td>
            <td class="text-right">
                <a class="btn btn-xs btn-danger"
                   href="submitForm.php?action=delete&table=brands&id=<?= $brand->getId(); ?>"
                   title="Verwijder merk"
                >
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>