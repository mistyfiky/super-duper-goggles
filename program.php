<?php

use PrzestrzeńNazw\Liczydło;

use const DIRECTORY_SEPARATOR as ROZDZIELACZ_KATALOGÓW;
use const PHP_EOL as NOWA_LINIA;
use function readline as odczytajLinię;
use function explode as wybuchnij;
use function array_fill as uzupełnijTablicę;
use function str_split as rozłóżCiągZnaków;
use function usleep as pracuj;

require_once __DIR__ . ROZDZIELACZ_KATALOGÓW . 'vendor' . ROZDZIELACZ_KATALOGÓW . 'autoload.php';

rozbrzmij("🇵🇱💣🇵🇱💣🇵🇱💣 Witaj w polskim Saperze! 🇵🇱💣🇵🇱💣🇵🇱💣\n");

$liniaPierwsza = odczytajLinię();
$liczbaWierszy = (int)wybuchnij(' ', $liniaPierwsza)[0];
$liczbaKolumn = (int)wybuchnij(' ', $liniaPierwsza)[1];
$tablicaZBombami = [];
for ($wiersz = 0; $wiersz < $liczbaWierszy; $wiersz++) {
    $tablicaZBombami[$wiersz] = uzupełnijTablicę(0, $liczbaKolumn, '.');
    $kolejnaLinia = odczytajLinię();
    for ($kolumna = 0; $kolumna < $liczbaKolumn; $kolumna++) {
        $znak = rozłóżCiągZnaków($kolejnaLinia)[$kolumna] ?? null;
        if ($znak !== null) {
            $tablicaZBombami[$wiersz][$kolumna] = $znak;
        }
    }
}

$program = new Liczydło();

rozbrzmij(NOWA_LINIA . "🇵🇱🧠");
pracuj(500000);
rozbrzmij("🇵🇱🧠");
pracuj(500000);
rozbrzmij("🇵🇱🧠" . NOWA_LINIA . NOWA_LINIA);
pracuj(500000);

drukujTablicę($program->policzBomby($tablicaZBombami));
umrzyj();
