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

    public function findById(int $id): ?Contact
    {
        $db = parent::getPDO();
        $db = $db->prepare('SELECT * FROM contact WHERE id = :id');
        $db->execute(['id' => $id]);
        $db = $db->fetch();

        if (!$db){
            return null;
        }

        $contact = new Contact();
        $contact->setId($db['id']);
        $contact->setName($db['name']);
        $contact->setEmail($db['email']);
        $contact->setPhone($db['phone_number']);

        return $contact;
    }

    public function createContact(Contact $contact): void
    {
        $db = parent::getPDO();
        $db = $db->prepare('INSERT INTO contact(name, email, phone_number) VALUES (:name, :email, :phone)');
        $db->execute([
            'name' => $contact->getName(),
            'email' => $contact->getEmail(),
            'phone' => $contact->getPhone(),
        ]);
    }

    public function deleteContact(int $id): void
    {
        $db = parent::getPDO();
        $db = $db->prepare('DELETE FROM contact WHERE id = :id');
        $db->execute(['id' => $id]);
    }

    public function modifyContact(int $id, Contact $contact): void
    {
        $db = parent::getPDO();
        $db = $db->prepare('UPDATE contact SET name = :name, email = :email, phone_number = :phone WHERE id = :id');
        $db->execute([
            'id' => $id,
            'name' => $contact->getName(),
            'email' => $contact->getEmail(),
            'phone' => $contact->getPhone(),
        ]);
    }
}