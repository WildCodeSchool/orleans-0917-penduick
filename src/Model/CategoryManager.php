<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 18/10/17
 * Time: 15:18
 */

namespace AuPenDuick\Model;


class CategoryManager extends EntityManager
{
    public function findCategory()
    {
        // Récupérer les description en array depuis la bdd
        $i = 1;
        $reponse = $this->pdo->query("SELECT text FROM category ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $category[$i] = $data['text'];
            $i++;
        }
        $reponse->closeCursor();

        return $category;
    }
}