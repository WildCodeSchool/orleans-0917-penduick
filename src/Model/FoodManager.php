<?php

namespace AuPenDuick\Model;


class FoodManager extends EntityManager
{
    public function findByCategory($id)
    {
        $query = "SELECT * FROM food WHERE category_id=:category_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('category_id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Food::class);
    }

    public function findOneFood($id)
    {
        $query = "SELECT * FROM food WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $foods = $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Food::class);
        return $foods[0];
    }

    public function insertFood(Food $food)
    {
        $query = "INSERT INTO food 
                  (title, description, price, category_id) 
                  VALUES (:title, :description, :price, :category)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $food->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('description', $food->getDescription(), \PDO::PARAM_STR);
        $statement->bindValue('price', $food->getPrice(), \PDO::PARAM_STR);
        $statement->bindValue('category', $food->getCategoryId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function deleteFood(Food $food)
    {
        $query = "DELETE FROM food WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $food->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }
}