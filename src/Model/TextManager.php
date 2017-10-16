<?php


namespace AuPenDuick\Model;


class TextManager extends EntityManager
{
    public function findTexts()
    {
        // Récupérer les texts en array depuis la bdd
        $i = 1;
        $reponse = $this->pdo->query("SELECT text FROM texts ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $texts[$i] = $data['text'];
            $i++;
        }$reponse->closeCursor();

        // Changer les & en <span class='yellow'>&</span>
        foreach ($texts as $key => $text) {
            $texts[$key] = str_replace("&", "<span class='yellow textShadow'>&</span>", $text);
        }

        return $texts;
    }
}