<?php

declare(strict_types=1);

class DBConnect
{
    public function getPDO()
    {
        return new PDO ('mysql:host=localhost;dbname=gestion_contacts;charset=utf8','root','root');
    }
}

/* Test de la récupération de la base :
$db = new DBConnect;
$db = $db->getPDO();
$db = $db->prepare('SELECT * FROM contact');
$db->execute();
$db = $db->fetchAll();

var_dump($db);*/