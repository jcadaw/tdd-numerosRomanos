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


    public function providerSimbolosBaseTriple(){
        return [
            '3 es III' => [3, 'III'],
            '30 es XXX' => [30, 'XXX'],
            '300 es CCC' => [300, 'CCC'],
            '3000 es MMM' => [3000, 'MMM'],
        ];
    }

    public function providerSimbolosBaseTripleTipo5(){
        return [
            '15 es XV' => [15, 'XV'],
            '150 es CL' => [150, 'CL'],
            '1500 es MD' => [1500, 'MD'],
        ];
    }    


    public function providerNumeros4(){
        return [
            '4 es IV' => [4, 'IV'],
            '40 es XL' => [40, 'XL'],
            '400 es CD' => [400, 'CD'],
        ];
    }    
    

    public function providerNumeros9(){
        return [
            '9 es IX' => [9, 'IX'],
            '90 es XC' => [90, 'XC'],
            '900 es CM' => [900, 'CM'],
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



    /**
     * @covers ::getRomanValue
     * @dataProvider providerSimbolosBaseTriple
     */
    public function testDeberiaPasarConSimboloTripleEnRomano($num, $espero){
        $sut = new NumeroRomano($num);
        $ret = $sut->getRomanValue();

        $this->assertSame($ret, $espero);
    }    

    /**
     * @covers ::getRomanValue
     * @dataProvider providerSimbolosBaseTripleTipo5
     */
    public function testDeberiaPasarConSimboloTripleTipo5EnRomano($num, $espero){
        $sut = new NumeroRomano($num);
        $ret = $sut->getRomanValue();

        $this->assertSame($ret, $espero);
    }     

    /**
     * Con números cuatro nos referimos a 4, 40, 400
     * 
     * @covers ::getRomanValue
     * @dataProvider providerNumeros4
     */
    public function testDeberiaPasarNumeros4($num, $espero){
        $sut = new NumeroRomano($num);
        $ret = $sut->getRomanValue();

        $this->assertSame($ret, $espero);
    }   
    /**
     * Con números nueve nos referimos a 9, 90, 900
     * 
     * @covers ::getRomanValue
     * @dataProvider providerNumeros9
     */
    public function testDeberiaPasarNumeros9($num, $espero){
        $sut = new NumeroRomano($num);
        $ret = $sut->getRomanValue();

        $this->assertSame($ret, $espero);
    }          
}