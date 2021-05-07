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
     * Comprueba si el número romano $c comienza con un 5 en decimal
     * 
     * @param string $c Caracter (único) en romano a comprobar
     * 
     * @return bool true en caso que la conversión a decimal comience con un 5
     *              false en otro caso
     */
    private function isNumero5(string $c): bool{
        $dec = array_search($c, self::MAP);
        if ($dec !== false){
            $dec_str = strval($dec);
            if ($dec_str[0] === '5'){
                return true;
            }
        }
        return false;
    }

    /**
     * Devolverá la representación en número romano de la propiedad $num
     * 
     * @return string La representación en número romano de $num
     * 
     */
    public function getRomanValue(): string{
        $ret = '';
        $aux = $this->num;
        $map = self::MAP;
        end($map);
        while($aux > 0){
            while(($cociente = intval($aux/key($map))) < 1){
                prev($map);
            }

            $aux -= $cociente*key($map);
            if ($cociente == 4){
                //tipo numero 9, 90, 900
                if (!empty($ret) && $this->isNumero5($ret[strlen($ret)-1])){
                    $ret[strlen($ret)-1] = current($map);
                    next($map);
                }
                else{
                    //tipo numero 4, 40, 400
                    $ret .= current($map);
                }
                $ret .= next($map);
            }
            else{
                $ret .= str_repeat(current($map), $cociente);
            }
        }

        return $ret;
    }
}