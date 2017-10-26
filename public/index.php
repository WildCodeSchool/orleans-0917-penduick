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
} elseif (!empty($route) && $route == 'admin') {
    $foodController = new \AuPenDuick\Controller\HomeController();
    echo $foodController->menuAdminAction();git status
} else {
    $foodController = new \AuPenDuick\Controller\HomeController();
    echo $foodController->homeAction();
}