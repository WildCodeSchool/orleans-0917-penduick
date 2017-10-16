<?php


namespace AuPenDuick\Model;


class TextModel extends EntityManager
{
    public function findAll()
    {
        // Récupérer textes
        $i = 1;
        $reponse = $this->pdo->query("SELECT * FROM texts ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $texts[$i] = $data['text'];
            $i++;
        }$reponse->closeCursor();

        return $texts;
    }
}