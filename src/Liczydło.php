<?php

namespace PrzestrzeńNazw;

use function count as policz;
use InvalidArgumentException as WyjątekSpowodowanyNieprawidłowymArgumentem;

class Liczydło
{
    public function policzBomby(array $tablicaZBombami): array
    {
        $tablicaZPoliczonymiBombami = $tablicaZBombami;
        $liczbaWierszy = static::policzWiersze($tablicaZBombami);
        $liczbaKolumn = static::policzKolumny($tablicaZBombami);
        for ($liczonyWiersz = 0; $liczonyWiersz < $liczbaWierszy; $liczonyWiersz++) {
            for ($liczonaKolumna = 0; $liczonaKolumna < $liczbaKolumn; $liczonaKolumna++) {
                if ($tablicaZBombami[$liczonyWiersz][$liczonaKolumna] === '*') {
                    continue;
                }
                $tablicaZPoliczonymiBombami[$liczonyWiersz][$liczonaKolumna] = $this->policzSąsiednieBomby($tablicaZBombami, $liczonyWiersz, $liczonaKolumna);
            }
        }

        return $tablicaZPoliczonymiBombami;
    }

    private function policzSąsiednieBomby(array $tablicaZBombami, int $liczonyWiersz, int $liczonaKolumna): int
    {
        $liczbaBomb = 0;
        $liczbaWierszy = static::policzWiersze($tablicaZBombami);
        $liczbaKolumn = static::policzKolumny($tablicaZBombami);
        for ($poziomyModyfikator = -1; $poziomyModyfikator <= 1; $poziomyModyfikator++) {
            for ($pionowyModyfikator = -1; $pionowyModyfikator <= 1; $pionowyModyfikator++) {
                $sprawdzanyWiersz = $liczonyWiersz + $poziomyModyfikator;
                $sprawdzanaKolumna = $liczonaKolumna + $pionowyModyfikator;
                if ($sprawdzanyWiersz >= 0 && $sprawdzanyWiersz < $liczbaWierszy
                    && $sprawdzanaKolumna >= 0 && $sprawdzanaKolumna < $liczbaKolumn
                ) {
                    if ($tablicaZBombami[$sprawdzanyWiersz][$sprawdzanaKolumna] === "*") {
                        $liczbaBomb++;
                    }
                }
            }
        }

        return $liczbaBomb;
    }

    private static function policzWiersze(array $tablicaZBombami): int
    {
        return policz($tablicaZBombami);
    }

    private static function policzKolumny(array $tablicaZBombami): int
    {
        if (empty($tablicaZBombami[0])) {
            throw new WyjątekSpowodowanyNieprawidłowymArgumentem();
        }

        return policz($tablicaZBombami[0]);
    }
}

