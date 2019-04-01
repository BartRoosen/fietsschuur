<?php

use Classes\Entities\DeleteRepository;
use Classes\Entities\TypeRepository;
use Classes\Services\FormSubmitter;
use Classes\Services\SessionService;

include 'auto_load.php';

$sessionService = new SessionService();

if (false === $sessionService->isUserLogedIn()) {
    $sessionService->clearSession();
    header('location: ./');
}

if (!isset($_GET['action'])) {
    header('location: ./');
}

switch ($_GET['action']) {
    case 'addBike':
        $formSubmitter = new FormSubmitter();
        $formSubmitter->addBike($_POST);
        break;
    case 'addType':
        if (isset($_POST)) {
            $formSubmitter = new FormSubmitter();
            $formSubmitter->addType($_POST);
        }
        break;
    case 'delete':
        if (isset($_GET['table'], $_GET['id'])) {
            $typeRepo = new DeleteRepository();
            $typeRepo->delete($_GET['table'], $_GET['id']);
        }
        break;
    case 'toggleVisibility':
        $formSubmitter = new FormSubmitter();
        $formSubmitter->toggleVisibility($_GET['id'], $_GET['isvisible']);
        break;
    case 'addSetting':
        if (isset($_GET['table'], $_POST)) {
            $formSubmitter  = new FormSubmitter();
            $_POST['table'] = $_GET['table'];
            $formSubmitter->addSettings($_POST);
        }
        break;
    case 'addExtraInfo':
        $formSubmitter = new FormSubmitter();
        $formSubmitter->addExtraInfo($_POST);
        break;
}

header('location: ./');
