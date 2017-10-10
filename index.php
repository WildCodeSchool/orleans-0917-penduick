<?php
// Connection DB
    include "function/connect.php";
    // Param
    $db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
    $user = "root";
    $password = "mysql01"; // Remplacer par votre password
    $bdd = connect($db, $user, $password);
    // Récupérer les infos de la BDD
include 'modele.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Au Pen Duick</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/pierre.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/dorian.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/fabien.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
    include "header.php";
    include "whoarewe.php";
    include "menu.php";
    include "findus.php";
    include "contactus.php";
    include "footer.php";
?>

