<?php

function umrzyj(): void
{
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
        echo PHP_EOL;
    }
}
