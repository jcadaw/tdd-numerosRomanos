<?php
declare(strict_types=1);

namespace Daw\SistemasNumeracion;

class NumeroRomano{
    private const MAP = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M',
    ];

    /**
     * @var int $num número entero que representa el objeto
     */
    private int $num;

    /**
     * @param int $num Número entero que será contenido en el objeto
     */
    public function __construct(int $num){
        $this->num = $num;
    }

    /**
     * Devolverá la representación en número romano de la propiedad $num
     * 
     * @return string La representación en número romano de $num
     * 
     */
    public function getRomanValue(): string{
        return self::MAP[$this->num];
    }
}