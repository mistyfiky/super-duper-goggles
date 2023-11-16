<?php

use TwojProjekt\Program;
use PHPUnit\Framework\TestCase;

class ProgramujTest extends TestCase
{
    /** @dataProvider dostarcz */
    public function testProgramuj(array $argumenty, array $przewidywane)
    {
        $program = new Program(...$argumenty);

        static::assertEquals($przewidywane, $program->programuj());
    }

    public static function dostarcz() : array
    {
        return [
            [
                [
                    4, 4,
                    [
                        ['*', '.', '.', '.'],
                        ['.', '.', '.', '.'],
                        ['.', '*', '.', '.'],
                        ['.', '.', '.', '.'],
                    ],
                ],
                [
                    ['*', '1', '0', '0'],
                    ['2', '2', '1', '0'],
                    ['1', '*', '1', '0'],
                    ['1', '1', '1', '0'],
                ],
            ],
        ];
    }
}

