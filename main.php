<?php

declare(strict_types=1);

require_once 'Command.php';

while (true) {
    $line = readline("Entrez votre commande : ");
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
    }
}