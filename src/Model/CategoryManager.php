<?php

namespace AuPenDuick\Model;

/**
 * Class CategoryManager
 * @package AuPenDuick\Model
 */
class CategoryManager extends EntityManager
{
    public function findAllType()
    {
        $query = "SELECT * FROM type";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Type::class);
    }

    public function findOneType($id)
    {
        $query = "SELECT * FROM type WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $types = $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Type::class);
        return $types[0];
    }

    public function insertType(Type $type)
    {
        $query = "INSERT INTO type 
                  (consistency) 
                  VALUES (:consistency)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('consistency', $type->getConsistency(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function deleteType(Type $type)
    {
        $query = "DELETE FROM type WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $type->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }
}
