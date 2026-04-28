<?php

declare(strict_types=1);

require_once 'DBConnect.php';

class ContactManager extends DBConnect
{
    public function findAll(): array
    {
        $db = parent::getPDO();
        $db = $db->prepare('SELECT * FROM contact');
        $db->execute();
        return $db->fetchAll();
    }
}

$contact = new ContactManager;
var_dump($contact->findAll());