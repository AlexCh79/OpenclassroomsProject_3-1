<?php

declare(strict_types=1);

require_once 'Command.php';

$isOn = true;

while ($isOn) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, quit) : ");
    if ($line === 'list') {
        $liste = new Command;
        $liste->list();
    } elseif (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $contact = new Command;
        $contact->detail($id);
    } elseif (preg_match('/^create\s+(.+)$/', $line, $matches)) {
        $ligne = $matches[1];
        $nouveau = array_map('trim', explode(',',$ligne));
        $contact = new Command;
        $contact->create($nouveau);
    } elseif (preg_match('/^delete\s+(\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $contact = new Command;
        $contact->delete($id);
    } elseif (preg_match('/^modify\s+(\d+),\s+(.+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $ligne = $matches[2];
        $modification = array_map('trim', explode(',',$ligne));
        $contact = new Command;
        $contact->modify($id, $modification);
    } elseif ($line === 'help') {
        $command = new Command;
        $command->help();
    } elseif ($line === 'quit') {
        $isOn = false;
    } else {
        echo "Commande inconnue. Tapez 'help' pour voir les commandes disponibles.\n";
    }
}