<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 18/10/17
 * Time: 15:14
 */

namespace AuPenDuick\Model;


class DisplayMenuManager extends EntityManager
{
    public function findDisplayDescription()
    {
        // Récupérer les descriptions (améliorables, ne récupérer que les bon textes et non toutes la bdd)
        $descriptionManager = new DescriptionManager();
        $description = $descriptionManager->findDescription();

        // Trier les descriptions et les mettre en display
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
        // Récupérer les categories (améliorables, ne récupérer que les bon textes et non toutes la bdd)
        $categoryManager = new DescriptionManager();
        $category = $categoryManager->findDescription();

        // Trier les textes et les mettre en display
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
        // Récupérer les prix
        $i = 1;
        $reponse = $this->pdo->query("SELECT price FROM displaymenu ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $displayPrice[$i] = $data['price'];
            $i++;
        }
        $reponse->closeCursor();

        return $displayPrice;
    }
}