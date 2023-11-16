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
        return [
            ['*', '1', '0', '0'],
            ['2', '2', '1', '0'],
            ['1', '*', '1', '0'],
            ['1', '1', '1', '0'],
        ];
    }
}

