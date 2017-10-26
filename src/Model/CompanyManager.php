<?php

namespace AuPenDuick\Model;

/**
 * Class DescriptionManager
 * @package AuPenDuick\Model
 */
class CompanyManager extends EntityManager
{
    public function findAllCompany()
    {
        $query = "SELECT * FROM companyTexts";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\Company::class);
    }
}