<?php
/**
 * Created by PhpStorm.
 * User: wilder11
 * Date: 07/11/17
 * Time: 09:48
 */

namespace AuPenDuick\Model;


class ExtraManager extends EntityManager
{
    public function addOne(Extra $extra)
    {
        $query = "INSERT INTO extra 
                  (title, price, type_id) 
                  VALUES (:title, :price, :type)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $extra->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('price', $extra->getPrice(), \PDO::PARAM_STR);
        $statement->bindValue('type', $extra->getTypeId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function findByType(int $id)
    {
        $query = "SELECT * FROM extra WHERE type_id=:type_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('type_id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Extra::class);
    }

    public function findAll()
    {
        $statement = $this->pdo->query('SELECT * FROM extra');
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Extra::class);
    }

    public function deleteExtra(int $id)
    {
        $query = "DELETE FROM extra WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}