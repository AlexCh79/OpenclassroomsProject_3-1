<?php

declare(strict_types=1);

require_once 'Config.php';

// Connexion à la base de données
class DBConnect
{
    public function getPDO()
    {
        return new PDO ('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    }
}