<?php

require 'functions.php';

define('FILES_PATH', $files_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);


function ajouter_vue(): void
{
    $fichier = FILES_PATH . 'compteur';
    $fichierJournalier = $fichier . '-' . date('Y-m-d');
    $compteur = 1;
    incrementerCompteur($fichier);
    incrementerCompteur($fichierJournalier);
}

function incrementerCompteur(string $fichier): void
{
    if (file_exists($fichier)) {
        $compteur = (int) file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}


function nombre_vues()
{
    $fichier = FILES_PATH . 'compteur';
    return file_get_contents($fichier);
}

function count_month_visits(int $year, int $month): int
{
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    $month_pattern = FILES_PATH . 'compteur-' . $year . '-' . $month . '-' . '*';
    return count_visits($month_pattern);
}

function count_year(int $year): int
{
    $year_pattern = FILES_PATH . 'compteur-' . $year . '-' . '*';
    return count_visits($year_pattern);
}

function count_visits(string $pattern): int
{
    $files = glob($pattern);
    $count = 0;
    foreach ($files as $file) {
        $count += (int)file_get_contents($file);
    }
    return $count;
}

function count_details(int $year, int $month): array
{
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    $month_pattern = FILES_PATH . 'compteur-' . $year . '-' . $month . '-' . '*';
    $detail = [];
    $files = glob($month_pattern);
    foreach ($files as $file) {
        $parts = explode('-', basename($file));
        $detail[] = [
            'day' => $parts[3],
            'month' => $parts[2],
            'year' => $parts[1],
            'count' => file_get_contents($file),
        ];
    }
    return $detail;
}
