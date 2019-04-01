<?php
include 'auto_load.php';

use Classes\Entities\User;
use Classes\Services\LoginChecker;
use Classes\Services\SessionService;

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'check':
            $user           = new User($_POST);
            $loginChecker   = new LoginChecker($user);
            $sessionService = new SessionService();

            $loginChecker->checkCredentials();
            break;
        case 'retry':
        case 'logout':
            $sessionService = new SessionService();
            $sessionService->clearSession();
            break;
    }
}
header('location: ./');

