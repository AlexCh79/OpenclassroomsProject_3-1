<?php

declare(strict_types=1);

require_once 'DBConnect.php';
require_once 'Contact.php';

class ContactManager extends DBConnect
{
    public function findAll(): array
    {
        $db = parent::getPDO();
        $db = $db->prepare('SELECT * FROM contact');
        $db->execute();
        $db = $db->fetchAll();
        
        $contacts = [];

        foreach ($db as $ligne){
            $contact = new Contact();
            $contact->setId($ligne['id']);
            $contact->setName($ligne['name']);
            $contact->setEmail($ligne['email']);
            $contact->setPhone($ligne['phone_number']);
            $contacts[] = $contact;
        }
        return $contacts;
    }
}
$liste = new ContactManager;
$liste = $liste->findAll();

foreach ($liste as $c){
    echo $c ."<br>";
}