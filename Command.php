<?php

declare(strict_types=1);
require_once 'ContactManager.php';
require_once 'Contact.php';

class Command
{
    // Liste complète
    public function listContacts(): void
    {
        echo "Liste des contacts : \n";
        $contactManager = new ContactManager;
        $contacts = $contactManager->findAll();
        foreach($contacts as $contact){
            echo $contact."\n";
        }
    }

    // Un seul contact
    public function detailsContact(int $id): void
    {
        $contactManager = new ContactManager;
        $contact = $contactManager->findById($id);
        echo $contact. "\n";
    }

    // Création d'un contact
    public function createContact(array $line): ?Contact
    {
        $contact = new Contact();
        $contact->setName($line[0]);
        $contact->setEmail($line[1]);
        $contact->setPhone($line[2]);

        $contactManager = new ContactManager();
        $contactManager->create($contact);
        echo "Nouveau contact enregistré avec succès ! {$contact} \n";
        
        return $contact;
    }

    // Suppression d'un contact
    public function deleteContact(int $id): void
    {
        $contactManager = new ContactManager();
        $contactManager->delete($id);
        echo "Suppression effectuée\n";
    }

    // Affichage de la commande help
    public function help(): void
    {
        $help = require 'help.php';
        echo "Liste des commandes disponibles : \n";
        foreach ($help as $command => $description) {
            echo "{$command} : {$description}\n";
        }
    }

    // Modification d'un contact
    public function modifyContact(int $id, array $line): void
    {
        $contact = new Contact();
        $contact->setName($line[0]);
        $contact->setEmail($line[1]);
        $contact->setPhone($line[2]);

        $contactManager = new ContactManager();
        $contactManager->modify($id, $contact);
        echo "Modification effectuée\n";
    }
}