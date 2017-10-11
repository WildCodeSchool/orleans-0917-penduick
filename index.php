<?php
// Connection DB
    include "function/connect.php";
    // Param
    $db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
    $user = "root";
    $password = "060390Pt"; // Remplacer par votre password
    $bdd = connect($db, $user, $password);
    // Récupérer les infos de la BDD
include 'modele.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Au Pen Duick</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/pierre.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/dorian.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/fabien.css" />
</head>
<?php
    include "header.php";
    include "whoarewe.php";
    include "menu.php";
    include "findus.php";
    include "contactus.php";
    include "footer.php";
?>

