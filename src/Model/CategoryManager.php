<?php

namespace AuPenDuick\Model;

class CategoryManager extends EntityManager
{
    public function findAll()
    {
        $query = "SELECT * FROM category";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
    }

    public function findByType($id)
    {
        $query = "SELECT * FROM category WHERE type_id=:type_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('type_id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
    }

    public function findAll()
    {
        $statement = $this->pdo->query('SELECT * FROM category');
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
    }
}
