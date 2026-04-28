<?php

declare(strict_types=1);
require_once 'ContactManager.php';

class Command
{
    public function list(): void
    {
        echo "affichage de la liste \n";
        $liste = new ContactManager;
        $liste = $liste->findAll();
        foreach($liste as $contact){
            echo $contact."\n";
        }
    }
}