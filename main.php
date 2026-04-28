<?php

declare(strict_types=1);

require_once 'Command.php';

while (true) {
    $line = readline("Entrez votre commande : ");
    if ($line === 'list') {
        $liste = new Command;
        $liste->list();
    }
}