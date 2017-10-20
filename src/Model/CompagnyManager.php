<?php

namespace AuPenDuick\Model;

/**
 * Class DescriptionManager
 * @package AuPenDuick\Model
 */
class CompagnyManager extends EntityManager
{
    public function findAllCompagny()
    {
        $query = "SELECT * FROM compagny";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Compagny::class);
    }
}