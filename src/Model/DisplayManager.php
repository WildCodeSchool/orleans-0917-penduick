<?php

namespace AuPenDuick\Model;

class DisplayManager extends EntityManager
{
    public function findDisplayText()
    {
        // Récupérer les textes (améliorables, ne récupérer que les bon textes et non toutes la bdd)
        $textManager = new TextManager();
        $texts = $textManager->findTexts();

        // Trier les textes et les mettre en display
        $i = 1;
        $reponse = $this->pdo->query("SELECT textId FROM display ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayText[$i] = $texts[$data['textId']];
            $i++;
        }$reponse->closeCursor();

        return $displayText;
    }

    public function findDisplayPictureName()
    {
        // Récupérer les images (idem, voir ci-dessus)
        $picturesManager = new PicturesManager();
        $picturesName = $picturesManager->findPicturesName();

        // Trier les images et les mettre en display
        $i = 1;
        $reponse = $this->pdo->query("SELECT picturesId FROM display ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayPictureName[$i] = $picturesName[$data['picturesId']];
            $i++;
        }$reponse->closeCursor();

        return $displayPictureName;
    }

    public function findDisplayPictureLocalSrc()
    {
        // Récupérer les images (idem, voir ci-dessus)
        $picturesLocalSrcManager = new PicturesManager();
        $picturesLocalSrc = $picturesLocalSrcManager->findPicturesLocalSrc();

        // Trier les imagesSrc et les mettre en display
        $i = 1;
        $reponse = $this->pdo->query("SELECT picturesId FROM display ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayPictureLocalSrc[$i] = $picturesLocalSrc[$data['picturesId']];
            $i++;
        }$reponse->closeCursor();

        return $displayPictureLocalSrc;
    }
}