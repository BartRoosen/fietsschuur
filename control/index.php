<?php

include 'auto_load.php';

use Classes\Entities\BikeRepository;
use Classes\Entities\BrandRepository;
use Classes\Entities\DropDownRepo;
use Classes\Entities\FrameSizeRepository;
use Classes\Entities\OpeningRepository;
use Classes\Entities\TypeRepository;
use Classes\Entities\WheelSizeRepository;
use Classes\Loaders\CssLoader;
use Classes\Loaders\JsLoader;
use Classes\Services\SessionService;

$cssLoader      = new CssLoader();
$jsLoader       = new JsLoader();
$open           = new OpeningRepository();
$sessionService = new SessionService();

$userName = $sessionService->readFromSession($sessionService::KEY_USER);
$login    = $sessionService->readFromSession($sessionService::KEY_LOGIN);
$page     = $sessionService->readFromSession($sessionService::KEY_PAGE);

if ($userName && $login && $page) {
    switch ($page) {
        case 'home':
            $dropDownRepo = new DropDownRepo();
            $bikeRepo     = new BikeRepository();
            $bikes        = $bikeRepo->getBikes();
            break;
        case 'type':
            $typeRepo = new TypeRepository();
            $types = $typeRepo->getTypes();
            break;
        case 'brand':
            $brandRepo = new BrandRepository();
            $brands = $brandRepo->getBrands();
            break;
        case 'frame':
            $frameSizeRepo = new FrameSizeRepository();
            $frameSizes = $frameSizeRepo->getFrameSizes();
            break;
        case 'wheel':
            $wheelSizeRepo = new WheelSizeRepository();
            $wheelSizes = $wheelSizeRepo->getWheelSizes();
            break;
    }
}

$cssHtml = $cssLoader->getHtml();
$jsHtml  = $jsLoader->getHtml();

include 'components/template.php';
