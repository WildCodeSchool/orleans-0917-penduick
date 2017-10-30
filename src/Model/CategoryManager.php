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

    public function findAll()
    {
        $statement = $this->pdo->query('SELECT * FROM category');
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
    }

    public function findOneCategory($id)
    {
        $query = "SELECT * FROM category WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $foods = $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Category::class);
        return $foods[0];
    }

    public function insertCategory(Category $category)
    {
        $query = "INSERT INTO category 
                  (name, nameShortcut, picture, type_id) 
                  VALUES (:name, :nameShortcut, :picture, :type)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('name', $category->getName(), \PDO::PARAM_STR);
        $statement->bindValue('nameShortcut', $category->getNameShortcut(), \PDO::PARAM_STR);
        $statement->bindValue('picture', $category->getPicture(), \PDO::PARAM_STR);
        $statement->bindValue('type', $category->getTypeId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function deleteCategory(Category $category)
    {
        $query = "DELETE FROM category WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }
}
