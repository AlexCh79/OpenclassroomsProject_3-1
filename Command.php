<?php

declare(strict_types=1);
require_once 'ContactManager.php';

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
}