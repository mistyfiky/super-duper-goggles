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

        return $this->policzBomby($oznaczonaTablica);
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

    private function policzSąsiednieBomby(array $tablicaZBombami, int $obecnyWiersz, int $obecnaKolumna): int
    {
        $liczbaBomb = 0;
        for ($poziomyModyfikator = -1; $poziomyModyfikator <= 1; $poziomyModyfikator++) {
            for ($pionowyModyfikator = -1; $pionowyModyfikator <= 1; $pionowyModyfikator++) {
                $sprawdzanyWiersz = $obecnyWiersz + $poziomyModyfikator;
                $sprawdzanaKolumna = $obecnaKolumna + $pionowyModyfikator;
                if ($sprawdzanyWiersz >= 0 && $sprawdzanyWiersz < $this->liczbaWierszy
                 && $sprawdzanaKolumna >= 0 && $sprawdzanaKolumna < $this->liczbaKolumn
                ) {
                    if ($tablicaZBombami[$sprawdzanyWiersz][$sprawdzanaKolumna] === "*") {
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

