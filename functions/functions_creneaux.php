<?php

function demander_crenau(): array
{
    echo "Veuillez entrer un crénau\n";


    while (true) {
        $numb1 = (int)readline("--- Heure de début : \n");
        if ($numb1 > 0 && $numb1 <= 22) {
            break;
        }
    }
    while (true) {
        $numb2 = (int)readline("--- Heure de fin : \n");
        if ($numb2 > 0 && $numb2 <= 23 && $numb2 > $numb1) {
            break;
        }
    }
    return [$numb1, $numb2];
}

function demander_creneaux(string $phrase = 'Veuillez entrer vos créneaux'): array
{
    $continuer = true;
    while ($continuer) {
        $creneaux[] = demander_crenau();
        $continuer = repondre_oui_non('voulez-vous continuer ? ');
    }
    return $creneaux;
}
