<?php

// Récupérer textes
$i = 1;
$reponse = $bdd->query("SELECT * FROM texts ORDER BY id ASC") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {
    $texts[$i] = $data['text'];
    $i++;
}$reponse->closeCursor();

// Nombre de textes en BDD
$reponse = $bdd->query("SELECT count(*) FROM texts") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {
    $nbTexts = $data['count(*)'];
}$reponse->closeCursor();

// Changer les & en <span class='Yellow'>&</span>
for ($i = 1; $i <= $nbTexts; $i++) {
    $texts[$i] = str_replace("&", "<span class='Yellow'>&</span>", $texts[$i]);
}

// Récupérer Images
$i = 1;
$reponse = $bdd->query("SELECT * FROM pictures ORDER BY id ASC") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {
    $picturesName[$i] = $data['name'];
    $picturesLocalSrc[$i] =$data['localSrc'];
    $i++;
}$reponse->closeCursor();

// Récupérer menu
$i = 1;
$reponse = $bdd->query("SELECT * FROM menu ORDER BY id ASC") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {
    $menuTitle[$i] = $data['title'];
    $menuDescription[$i] = $data['description'];
    $menuPrice[$i] =$data['price'];
    $i++;
}$reponse->closeCursor();

// Récupérer display
$i = 1;
$reponse = $bdd->query("SELECT * FROM display ORDER BY id ASC") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {
    $displayText[$i] = $texts[$data['textId']];
    $displayPictureName[$i] = $picturesName[$data['picturesId']];
    $displayPictureLocalSrc[$i] = $picturesLocalSrc[$data['picturesId']];
    $i++;
}$reponse->closeCursor();

//var_dump($texts);
//var_dump($displayText);
//var_dump($displayPictureName);
//var_dump($displayPictureLocalSrc);
//var_dump($menuTitle);
//var_dump($menuDescription);
//var_dump($menuPrice);
//var_dump($picturesName);
//var_dump($picturesLocalSrc);