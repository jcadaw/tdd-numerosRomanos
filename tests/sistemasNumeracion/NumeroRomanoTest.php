<?php
declare(strict_types=1);

namespace Daw\Tests\SistemasNumeracion;

use Daw\SistemasNumeracion\NumeroRomano;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Daw\Tests\SistemasNumeracion 
 */
class NumeroRomanoTest extends TestCase{
    public function providerSimbolosBase(){
        return [
            "1 es I" => [1, 'I'],
            "5 es V" => [5, 'V'],
            "10 es X" => [10, 'X'],
            "50 es L" => [50, 'L'],
            "100 es C" => [100, 'C'],
            "500 es D" => [500, 'D'],
            "1000 es M" => [1000, 'M'],
        ];
    }


    /**
     * @covers ::getRomanValue
     * @dataProvider providerSimbolosBase
     */
    public function testDeberiaPasarAlUsarNumeroDecimalQueDevuelveNumeroRomanoBasico($num, $espero){
        $sut = new NumeroRomano($num);
        $ret = $sut->getRomanValue();

        $this->assertSame($ret, $espero);
    }
}