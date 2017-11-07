<?php

namespace AuPenDuick\Model;

/**
 * Class DescriptionManager
 * @package AuPenDuick\Model
 */
class CompanyTextManager extends EntityManager
{
    public function findAll()
    {
        $statement = $this->pdo->query("SELECT * FROM companyText");
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\CompanyText::class);
    }

    public function updateText(CompanyText $text)
    {
        $query = "UPDATE companyText SET header=:header, subHeader=:subHeader, event=:event, about_us=:about_us,
                  telephone=:telephone";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('header', $text->getHeader(), \PDO::PARAM_STR);
        $statement->bindValue('subHeader', $text->getsubHeader(), \PDO::PARAM_STR);
        $statement->bindValue('event', $text->getEvent(), \PDO::PARAM_STR);
        $statement->bindValue('about_us', $text->getAboutUs(), \PDO::PARAM_STR);
        $statement->bindValue('telephone', $text->getTelephone(), \PDO::PARAM_STR);
        return $statement->execute();
    }
}

