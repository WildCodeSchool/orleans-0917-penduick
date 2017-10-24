<?php

namespace AuPenDuick\Model;

/**
 * Class CategoryManager
 * @package AuPenDuick\Model
 */
class CategoryManager extends EntityManager
{
    public function findByType($id)
    {
        $query = "SELECT * FROM category WHERE type_id=:type_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('type_id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
    }
}
