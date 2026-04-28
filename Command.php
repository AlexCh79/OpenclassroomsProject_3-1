<?php

declare(strict_types=1);
require_once 'ContactManager.php';
require_once 'Contact.php';

class Command
{
    // Liste complète
    public function list(): void
    {
        echo "Liste des contacts : \n";
        $liste = new ContactManager;
        $liste = $liste->findAll();
        foreach($liste as $contact){
            echo $contact."\n";
        }
    }

    // Un seul contact
    public function detail(int $id): void
    {
        $contact = new ContactManager;
        $contact = $contact->findById($id);
        echo $contact. "\n";
    }

    // Création d'un contact
    public function create(array $line): ?Contact
    {
        $nouveau = new Contact();
        $nouveau->setName($line[0]);
        $nouveau->setEmail($line[1]);
        $nouveau->setPhone($line[2]);
        $contact = new ContactManager();
        $contact->createContact($nouveau);
        echo "Nouveau contact enregistré avec succès ! {$nouveau} \n";
        return $nouveau;
    }
}