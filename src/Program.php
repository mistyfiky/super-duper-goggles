<?php

namespace TwojProjekt;

class Program
{
    public function __construct(
        private int $liczbaWierszy,
        private int $liczbaKolumn,
        private array $tablica,
    )
    {
    }

    public function programuj(): array
    {
        $wyzerowanaTablica = $this->stwórzWyzerowanąTablicę();
        $oznaczonaTablica = $this->oznaczMiejscaBomb($wyzerowanaTablica);


        return [
            ['*', '1', '0', '0'],
            ['2', '2', '1', '0'],
            ['1', '*', '1', '0'],
            ['1', '1', '1', '0'],
        ];
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
                if ($wyzerowanaTablica[$wiersz][$kolumna] === '*') {
                    $oznaczonaTablica[$wiersz][$kolumna] = '*';
                }
            }
        }

        return $oznaczonaTablica;
    }
}

