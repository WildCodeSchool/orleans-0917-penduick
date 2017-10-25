<?php

require '../connect.php';
$bdd = mysqli_connect(DSN, USERNAME, PASSWORD);

$id = mysqli_real_escape_string($bdd, $_POST['id']);

$req = "DELETE FROM food WHERE id='$id'";
$result = mysqli_query($bdd, $req);

header('Location: index.php');