<?php


?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'shared/head.php' ?>
</head>
<body>

<?php
if (!$login && !$userName) {
    include 'login/login.php';
} elseif (!$login && $userName) {
    include 'login/fail.php';
} elseif ($login && $userName) {
    include 'shared/header.php';
    include $page . '/index.php';
}
?>

<?= $jsHtml; ?>
</body>
</html>