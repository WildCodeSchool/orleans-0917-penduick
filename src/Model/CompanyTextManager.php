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
        $statement = $this->pdo->query("SELECT * FROM companyTexts");
        return $statement->fetchAll(\PDO::FETCH_CLASS, \AuPenDuick\Model\CompanyText::class);
    }

    public function updateText($texts, $id)
    {
        $query = "UPDATE companyTexts SET header=:header, header_2=:header_2, event=:event, about_us=:about_us,
                  telephone=:telephone WHERE id = '".$id."'";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('header', $texts->getHeader(), \PDO::PARAM_STR);
        $statement->bindValue('header_2', $texts->getHeader2(), \PDO::PARAM_STR);
        $statement->bindValue('event', $texts->getEvent(), \PDO::PARAM_STR);
        $statement->bindValue('about_us', $texts->getAboutUs(), \PDO::PARAM_STR);
        $statement->bindValue('telephone', $texts->getTelephone(), \PDO::PARAM_STR);
        return $statement->execute();
    }
}