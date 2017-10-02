<?php

// Connection DB

    // Param
    $db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
    $user = "root";
    $password = "mysql01"; // Remplacer par votre password

    include "function/connect.php";
    $bdd = connect($db, $user, $password);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Au Pen Duick</title>

    <link rel="stylesheet" type="text/css" media="all" href="pierre.css" />
    <link rel="stylesheet" type="text/css" media="all" href="dorian.css" />
    <link rel="stylesheet" type="text/css" media="all" href="fabien.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
    include "header.php";
    include "pierre.php";
    include "dorian.php";
    include "fabien.php";
    include "footer.php";
?>

