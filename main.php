<?php

declare(strict_types=1);

require_once 'Command.php';

$command = new Command();

$isOn = true;

while ($isOn) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, quit) : ");
    if ($line === 'list') {
        $command->listContacts();
    } elseif (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->detailsContact($id);
    } elseif (preg_match('/^create\s+(.+)$/', $line, $matches)) {
        $data = $matches[1];
        $contact = array_map('trim', explode(',',$data));
        $command->createContact($contact);
    } elseif (preg_match('/^delete\s+(\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->deleteContact($id);
    } elseif (preg_match('/^modify\s+(\d+),\s+(.+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $data = $matches[2];
        $contact = array_map('trim', explode(',',$data));
        $command->modifyContact($id, $contact);
    } elseif ($line === 'help') {
        $command->help();
    } elseif ($line === 'quit') {
        $isOn = false;
    } else {
        echo "Commande inconnue. Tapez 'help' pour voir les commandes disponibles.\n";
    }
}