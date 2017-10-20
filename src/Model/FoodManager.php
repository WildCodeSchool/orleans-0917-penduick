<?php

namespace AuPenDuick\Model;


class FoodManager extends EntityManager
{
    public function findAllFoodSalt()
    {
        $query = "SELECT * FROM food WHERE category_id=:category_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('category_id', 1, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Food::class);
    }

    public function findAllFoodSugar()
    {
        $query = "SELECT * FROM food WHERE category_id=:category_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('category_id', 2, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Food::class);
    }
}