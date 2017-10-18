<?php
// Autoload & connect
require '../vendor/autoload.php';
require '../connect.php';

// Routeur basique
if (!empty($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route = '';
}

// On appelle une methode d'un controlleur en fonction de la route saisie en URL
if ($route == 'home' OR $route == '') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->homeAction();
} elseif ($route == 'carte') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo $personController->menuContentAction();
} else {
    echo 'La page n\'existe pas';
}
exit();

