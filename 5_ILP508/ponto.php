<?php
class Ponto {
    private int $x;
    private int $y;
    static int $numObjCriados = 0;

    function __construct($x, $y) {
        $this->setX($x);
        $this->setY($y);
        self::$numObjCriados++;
    }

    function setX($value) {
        $this->x = $value;
    }

    function getX() {
        return $this->x;
    }

    function setY($value) {
        $this->y = $value;
    }

    function getY() {
        return $this->y;
    }

    function deslocar() {
        //
    }

    function toString() {
        return '';
    }

    static function contadorPontos() {
        return self::$numObjCriados;
    }
    
    public function distanciaPonto($outroPonto) {
        $pontoUmElevado = pow($outroPonto->x -$this->x, 2);
        $pontoDoisElevado = pow($outroPonto->y - $this->y, 2);
        $distancia = sqrt($pontoUmElevado + $pontoDoisElevado);

        return $distancia;
    }
    
    public function distanciaCoordenadas($x2, $y2) {
        $dx =  $x2 - $this->x;
        $dy = $y2 - $this->y;
        $distancia = sqrt($dx * $dx + $dy * $dy);

        return $distancia;
    }
    
    public static function distanciaEntrePontos($x1, $y1, $x2, $y2) {
        $dx = $x2 - $x1;
        $dy = $y2 - $y1;
        $distancia = sqrt($dx * $dx + $dy * $dy);

        return $distancia;
    }
}