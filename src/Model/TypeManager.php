<?php

namespace AuPenDuick\Model;

class TypeManager extends EntityManager
{
    public function findAllType()
    {
        $query = "SELECT * FROM type";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Type::class);
    }
}