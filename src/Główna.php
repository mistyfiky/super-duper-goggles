<?php

namespace TwojProjekt;

class Główna
{
    public function __construct(
        private int $liczbaWierszy,
        private int $liczbaKolumn,
        private array $tablica,
    )
    {
    }

    public function rozpocznij(): array
    {
        $wyzerowanaTablica = $this->stwórzWyzerowanąTablicę();
        $oznaczonaTablica = $this->oznaczMiejscaBomb($wyzerowanaTablica);
        $policzonaTablica = $this->policzBomby($oznaczonaTablica);

        return $policzonaTablica;
    }

    private function stwórzWyzerowanąTablicę(): array
    {
        $wyzerowanaTablica = [];
        for ($wiersz = 0; $wiersz < $this->liczbaWierszy; $wiersz++) {
            $wyzerowanaTablica[$wiersz] = array_fill(0, $this->liczbaKolumn, '0');
        }

        return $wyzerowanaTablica;
    }

    private function oznaczMiejscaBomb(array $wyzerowanaTablica): array
    {
        $oznaczonaTablica = $wyzerowanaTablica;
        for ($wiersz = 0; $wiersz < $this->liczbaWierszy; $wiersz++) {
            for ($kolumna = 0; $kolumna < $this->liczbaKolumn; $kolumna++) {
                if ($this->tablica[$wiersz][$kolumna] === '*') {
                    $oznaczonaTablica[$wiersz][$kolumna] = '*';
                }
            }
        }

        return $oznaczonaTablica;
    }

    private function policzSąsiednieBomby(array $tablicaZBombami, $wiersz, $kolumna): int
    {
        $liczbaBomb = 0;
        // Sprawdzanie ośmiu sąsiadujących komórek (góra, dół, lewo, prawo, oraz cztery narożniki)
        for ($i = -1; $i <= 1; $i++) {
            for ($j = -1; $j <= 1; $j++) {
                $sprWiersz = $wiersz + $i;
                $sprKolumna = $kolumna + $j;
    
                // Sprawdzanie, czy nie wyszliśmy poza granice tablicy
                if ($sprWiersz >= 0 && $sprWiersz < $this->liczbaWierszy && $sprKolumna >= 0 && $sprKolumna < $this->liczbaKolumn) {
                    if ($tablicaZBombami[$sprWiersz][$sprKolumna] == "*") {
                        $liczbaBomb++;
                    }
                }
            }
        }
        return $liczbaBomb;
    }

    private function policzBomby(array $tablicaZBombami): array
    {
        $tablicaZPoliczonymiBombami = $tablicaZBombami;
        for ($wiersz = 0; $wiersz < $this->liczbaWierszy; $wiersz++) {
            for ($kolumna = 0; $kolumna < $this->liczbaKolumn; $kolumna++) {
                if ($tablicaZBombami[$wiersz][$kolumna] != "*") {
                    $tablicaZPoliczonymiBombami[$wiersz][$kolumna] = $this->policzSąsiednieBomby($tablicaZBombami, $wiersz, $kolumna);
                }
            }
        }
        return $tablicaZPoliczonymiBombami;
    }
}

