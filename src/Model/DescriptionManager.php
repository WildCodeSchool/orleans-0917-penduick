<?php

namespace AuPenDuick\Model;

/**
 * Class DescriptionManager
 * @package AuPenDuick\Model
 */
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