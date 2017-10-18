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
        }
        $reponse->closeCursor();

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
        }
        $reponse->closeCursor();

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
        }
        $reponse->closeCursor();

        return $displayPictureLocalSrc;
    }

    public function findDisplayDescription()
    {
        // Récupérer les images (idem, voir ci-dessus)
        $descriptionManager = new DescriptionManager();
        $description = $descriptionManager->findDescription();

        // Trier les imagesSrc et les mettre en display
        $i = 1;
        $reponse = $this->pdo->query("SELECT descriptionId FROM displaymenu ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayDescription[$i] = $description[$data['descriptionId']];
            $i++;
        }
        $reponse->closeCursor();

        return $displayDescription;
    }

    public function findDisplayCategory()
    {
        // Récupérer les images (idem, voir ci-dessus)
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findCategory();

        // Trier les imagesSrc et les mettre en display
        $i = 1;
        $reponse = $this->pdo->query("SELECT categoryId FROM displaymenu ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayCategory[$i] = $category[$data['categoryId']];
            $i++;
        }
        $reponse->closeCursor();

        return $displayCategory;
    }

    public function findDisplayPrice()
    {
        // Récupérer les images (idem, voir ci-dessus)
        $categoryManager = new DescriptionManager();
        $category = $categoryManager->findCategory();

        // Trier les imagesSrc et les mettre en display
        $i = 1;
        $reponse = $this->pdo->query("SELECT categoryId FROM displaymenu ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayCategory[$i] = $category[$data['categoryId']];
            $i++;
        }
        $reponse->closeCursor();

        return $displayCategory;
    }
}