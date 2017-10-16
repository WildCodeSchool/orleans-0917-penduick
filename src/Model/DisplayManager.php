<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 13/10/17
 * Time: 17:10
 */

namespace AuPenDuick\Model;


class DisplayManager extends EntityManager
{
    public function findDisplayText()
    {
        // Récupérer les textes
        $textManager = new TextManager();
        $texts = $textManager->findTexts();

        // Les mettre en display
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
        $i = 1;
        $reponse = $this->pdo->query("SELECT picturesId FROM display ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayPictureLocalSrc[$i] = $picturesLocalSrc[$data['picturesId']];
            $i++;
        }$reponse->closeCursor();

        return $displayPictureLocalSrc;
    }
}