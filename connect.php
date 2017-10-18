<?php

define ('DSN', 'mysql:host=localhost;dbname=AuPenDuick;charset=utf8');
define ('USERNAME', 'root');
define ('PASSWORD', 'azerty1234');

$pdo = new \PDO(DSN, USERNAME, PASSWORD, [
    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
]);