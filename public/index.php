<?php
// Autoload & connect
require '../vendor/autoload.php';
require '../connect.php';

// Routeur basique, necessite une url index.php?route=xxx
$route = $_GET['route'];
// On appelle une methode d'un controlleur en fonction de la route saisie en URL
if ($route == 'home') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo  $personController->homeAction();
} elseif ($route == 'carte') {
    $personController = new \AuPenDuick\Controller\HomeController();
    echo  $personController->menuContentAction();
} else {
    echo 'La page n\'existe pas';
}
exit();
?>

