<?php

declare(strict_types=1);

require_once 'ContactManager.php';

while (true) {
    $line = readline("Entrez votre commande : ");
    if ($line === 'list') {
        echo "affichage de la liste \n";
        $liste = new ContactManager;
        $liste = $liste->findAll();
        foreach($liste as $contact){
            echo $contact."\n";
        }
    }
}
