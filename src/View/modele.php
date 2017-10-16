<?php

// Récupérer menu
$i = 1;
$reponse = $bdd->query("SELECT * FROM menu ORDER BY id ASC") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {
    $menuTitle[$i] = $data['title'];
    $menuDescription[$i] = $data['description'];
    $menuPrice[$i] = $data['price'];
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