<?php

use TwojProjekt\Główna;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

echo "🇵🇱💣🇵🇱💣🇵🇱💣 Witaj w polskim Saperze! 🇵🇱💣🇵🇱💣🇵🇱💣\n";

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

$program = new Główna($liczbaWierszy, $liczbaKolumn, $tablica);

rozbrzmij("\n🇵🇱🧠");
pracuj();
rozbrzmij("🇵🇱🧠");
pracuj();
rozbrzmij("🇵🇱🧠\n\n");
pracuj();

drukujTablicę($program->rozpocznij());
umrzyj();
