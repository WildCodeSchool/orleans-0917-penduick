<?php
// Connection DB
    include "function/connect.php";
    // Param
    $db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
    $user = "root";
    $password = "mysql01"; // Remplacer par votre password
    $bdd = connect($db, $user, $password);

    // Récupérer les infos de la BDD
    include 'modele.php';

    // Corpus du site
    include "head.php";
    include "header.php";
    include "whoarewe.php";
    include "menu.php";
    include "findus.php";
    include "footer.php";
?>

