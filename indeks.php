<?php

use TwojProjekt\Program;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

function umrzyj() { die; }

echo "💣💣💣 Witaj w polskim Saperze! 💣💣💣\n";

$liniaPierwsza = readline();
$liczbaWierszy = (int)explode(' ', $liniaPierwsza)[0];
$liczbaKolumn = (int)explode(' ', $liniaPierwsza)[1];
$tablica = [];
for ($wiersz = 0; $wiersz < $liczbaWierszy; $wiersz++) {
    $tablica[$wiersz] = array_fill(0, $liczbaKolumn, '.');
    $kolejnaLinia = readline();
    for ($kolumna = 0; $kolumna < $liczbaKolumn; $kolumna++) {
        $znak = str_split($kolejnaLinia)[$kolumna] ?? null;
        if ($znak !== null) {
            $tablica[$wiersz][$kolumna] = $znak;
        }
    }
}

$program = new Program($liczbaWierszy, $liczbaKolumn, $tablica);

var_dump($program->programuj());

umrzyj();