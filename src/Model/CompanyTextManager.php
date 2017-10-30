<?php

namespace AuPenDuick\Model;

/**
 * Class DescriptionManager
 * @package AuPenDuick\Model
 */
class CompanyTextManager extends EntityManager
{
    public function findAllCompany()
    {
        $statement = $this->pdo->query("SELECT * FROM companyTexts");
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\CompanyText::class);
    }
}