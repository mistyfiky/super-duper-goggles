<?php

use TwojProjekt\PrzykladowaKlasa;
use PHPUnit\Framework\TestCase;

class PrzykladowaKlasaTest extends TestCase
{
    public function testDodaj()
    {
        $przykladowa = new PrzykladowaKlasa();
        $this->assertEquals(4, $przykladowa->dodaj(2, 2));
    }
}

