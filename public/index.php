<?php
// Autoload & connect
require '../vendor/autoload.php';
require '../connect.php';

// Routeur basique
if (!empty($_GET['route'])) {
    $route = $_GET['route'];
}

if (!empty($route) && $route == 'carte') {
    $foodController = new \AuPenDuick\Controller\HomeController();
    echo $foodController->menuContentAction();
}elseif (!empty($route) && $route == 'admin') {
        $foodController = new \AuPenDuick\Controller\HomeController();
        echo $foodController->menuAdminAction();
} elseif (!empty($route) && $route == 'addCrepe') {
    $foodController = new \AuPenDuick\Controller\HomeController();
    echo $foodController->addCrepe();
}elseif (!empty($route) && $route == 'deleteCrepe'){
    $foodController = new \AuPenDuick\Controller\HomeController();
    echo $foodController->deleteCrepe();
}else {
    $foodController = new \AuPenDuick\Controller\HomeController();
    echo $foodController->homeAction();}
