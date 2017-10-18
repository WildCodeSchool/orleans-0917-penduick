<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 18/10/17
 * Time: 15:16
 */

namespace AuPenDuick\Model;


class DescriptionManager extends EntityManager
{
    public function findDescription()
    {
        // Récupérer les description en array depuis la bdd
        $i = 1;
        $reponse = $this->pdo->query("SELECT text FROM description ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $description[$i] = $data['text'];
            $i++;
        }
        $reponse->closeCursor();

        return $description;
    }
}