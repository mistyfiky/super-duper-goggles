<?php

use const PHP_EOL as NOWA_LINIA;

function rozbrzmij(string $tekst): void
{
    echo $tekst;
}

function umrzyj(): void
{
    rozbrzmij(NOWA_LINIA . "© formoza" . NOWA_LINIA);
    die();
}

function drukujTablicę(array $tablica): void
{
    $liczbaWierszy = count($tablica);
    for ($wiersz = 0; $wiersz < $liczbaWierszy; $wiersz++) {
        $liczbaKolumn = count($tablica[$wiersz]);
        for ($kolumna = 0; $kolumna < $liczbaKolumn; $kolumna++) {
            $znak = $tablica[$wiersz][$kolumna];
            if ($znak == "*")
                echo "💥";
            else
                echo $znak;
        }
        echo NOWA_LINIA;
    }
}
