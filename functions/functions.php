<?php

require_once('functions_creneaux.php');

function repondre_oui_non(string $phrase): bool
{
    while (true) {
        $reponse = readline($phrase . "(o)ui/(n)on: ");
        if ($reponse === "o") {
            return true;
        } elseif ($reponse === "n") {
            return false;
        }
    }
}

function dump($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html(array $creneaux): string
{
    $rows = [];
    if (empty($creneaux)) {
        return 'Fermé';
    }
    foreach ($creneaux as $creneau) {
        $rows[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    }
    return "Ouvert de " . implode(' et ', $rows);
}


function in_creneaux(int $heure, array $creneaux): bool
{

    foreach ($creneaux as $creneau) {
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin) {
            return true;
        }
    }
    return false;
}

function select(string $name, $value,  array $options): string
{
    $html_options = [];
    foreach ($options as $k => $option) {
        $attributes = $k === $value ? 'selected' : '';
        $html_options[] = "<option value='$k'>$option</option>";
    }
    return "<select class='form-control' name='$name' > " . implode($html_options) . '</select>';
}
