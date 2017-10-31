<?php
// Autoload & connect
require '../vendor/autoload.php';
require '../connect.php';

// Routeur basique
if (!empty($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route = null;
}

if ($route == 'admin') {
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->adminAction();
} elseif ($route == 'menuAdmin') {
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->menuAction();
} elseif ($route == 'updateFood'){
    $personController = new \AuPenDuick\Controller\AdminController();
}elseif (!empty($route) && $route == 'addType'){
    $foodController = new \AuPenDuick\Controller\AdminController();
    echo $foodController->addTypeAction();
}elseif (!empty($route) && $route == 'deleteType'){
    $foodController = new \AuPenDuick\Controller\AdminController();
    echo $foodController->deleteTypeAction();
} elseif ($route == 'addType'){
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->addTypeAction();
} elseif ($route == 'addCategory'){
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->addCategoryAction();
} elseif ($route == 'addFood'){
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->addFoodAction();
} elseif ($route == 'updateText'){
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->updateTextAction();
} elseif ($route == 'addPicture'){
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->addPictureAction();
} elseif ($route == 'deletePicture'){
    $personController = new \AuPenDuick\Controller\AdminController();
    echo $personController->deletePictureAction();
} elseif ($route == 'carte') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->menuContentAction();
} else {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->homeAction();
}