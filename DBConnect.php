<?php

declare(strict_types=1);

// Connexion à la base de données
class DBConnect
{
    public function getPDO()
    {
        return new PDO ('mysql:host=localhost;dbname=gestion_contacts;charset=utf8','root','root');
    }
}