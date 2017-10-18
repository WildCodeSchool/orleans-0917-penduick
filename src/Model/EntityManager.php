<?php

namespace AuPenDuick\Model;
class EntityManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD, [
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ]);
    }
}