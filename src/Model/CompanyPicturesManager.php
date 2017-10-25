<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 25/10/17
 * Time: 10:50
 */

namespace AuPenDuick\Model;

class CompanyPicturesManager extends EntityManager
{
    public function findAll()
    {
        $query = "SELECT * FROM companyPictures";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\CompanyPictures::class);
    }
}