<?php
// Autoload & connect
require '../vendor/autoload.php';
require '../connect.php';

// Routeur basique
if (!empty($_GET['route'])) {
    $route = $_GET['route'];
}

if (!empty($route) && $route == 'carte') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->menuContentAction();
} elseif (!empty($route) && $route == 'admin') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->adminAction();
} else {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->homeAction();
}

