<?php

use Classes\Services\SessionService;

include 'auto_load.php';

$sessionService = new SessionService();

if (!isset($_GET['page']) || false === $sessionService->isUserLogedIn()) {
    $sessionService->clearSession();
} else {
    $sessionService->writeToSession([$sessionService::KEY_PAGE => $_GET['page']]);
}

header('location: ./');