<?php

use PrzestrzeńNazw\Liczydło;
use PHPUnit\Framework\TestCase;

class LiczydłoTest extends TestCase
{
    /**
     * @dataProvider dostarczDane
     */
    public function testPoliczBomby(array $tablicaZBombami, array $przewidywanaTablicaZPoliczonymiBombami)
    {
        $liczydło = new Liczydło();

        static::assertEquals($przewidywanaTablicaZPoliczonymiBombami, $liczydło->policzBomby($tablicaZBombami));
    }

    public static function dostarczDane() : array
    {
        return [
            [
                [
                    ['*', '.', '.', '.'],
                    ['.', '.', '.', '.'],
                    ['.', '*', '.', '.'],
                    ['.', '.', '.', '.'],
                ],
                [
                    ['*', '1', '0', '0'],
                    ['2', '2', '1', '0'],
                    ['1', '*', '1', '0'],
                    ['1', '1', '1', '0'],
                ],
            ],
            [
                [
                    ['*', '*', '.', '.', '.'],
                    ['.', '.', '.', '.', '.'],
                    ['.', '*', '.', '.', '.'],
                ],
                [
                    ['*', '*', '1', '0', '0'],
                    ['3', '3', '2', '0', '0'],
                    ['1', '*', '1', '0', '0'],
                ],
            ],
            [
                [
                    ['.', '.', '.', '.', '*'],
                    ['.', '.', '*', '*', '*'],
                    ['.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.'],
                    ['*', '.', '.', '.', '.'],
                ],
                [
                    ['0', '1', '2', '4', '*'],
                    ['0', '1', '*', '*', '*'],
                    ['0', '1', '2', '3', '2'],
                    ['1', '1', '0', '0', '0'],
                    ['*', '1', '0', '0', '0'],
                ],
            ],
            [
                [
                    ['.', '*', '*', '*', '.'],
                    ['*', '.', '*', '*', '*'],
                    ['*', '*', '*', '*', '*'],
                    ['*', '*', '*', '*', '*'],
                    ['.', '*', '*', '.', '*'],
                ],
                [
                    ['2', '*', '*', '*', '3'],
                    ['*', '7', '*', '*', '*'],
                    ['*', '*', '*', '*', '*'],
                    ['*', '*', '*', '*', '*'],
                    ['3', '*', '*', '5', '*'],
                ],
            ],
        ];
    }
}

