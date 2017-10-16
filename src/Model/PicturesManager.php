<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 13/10/17
 * Time: 17:12
 */

namespace AuPenDuick\Model;


class PicturesManager extends EntityManager
{
    public function findPicturesName()
    {
        $i = 1;
        $reponse = $this->pdo->query("SELECT name FROM pictures ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $picturesName[$i] = $data['name'];
            $i++;
        }$reponse->closeCursor();

        return $picturesName;
    }

    public function findPicturesLocalSrc()
    {
        $i = 1;
        $reponse = $this->pdo->query("SELECT localSrc FROM pictures ORDER BY id ASC") or die(print_r($this->pdo->errorInfo()));
        while ($data = $reponse->fetch()) {
            $picturesLocalSrc[$i] = $data['localSrc'];
            $i++;
        }$reponse->closeCursor();

        return $picturesLocalSrc;
    }
}