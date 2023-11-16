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
        return 1;
    }

    private function policzBomby(array $tablicaZBombami): array
    {
        $tablizaZPoliczonymiBombami = $tablicaZBombami;
        for ($wiersz = 0; $wiersz < $this->liczbaWierszy; $wiersz++) {
            for ($kolumna = 0; $kolumna < $this->liczbaKolumn; $kolumna++) {
                if ($tablicaZBombami[$wiersz][$kolumna] != "*") {
                    $this->policzSąsiednieBomby($tablicaZBombami, $wiersz, $kolumna);
                }
            }
        }
        return $tablizaZPoliczonymiBombami;
    }
}

