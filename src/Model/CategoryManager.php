<?php

namespace AuPenDuick\Model;

/**
 * Class CategoryManager
 * @package AuPenDuick\Model
 */
class CategoryManager extends EntityManager
{
    public function findAllCategory()
    {
        $query = "SELECT * FROM category";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
    }
}
