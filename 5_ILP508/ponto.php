<?php
class Ponto {
    private int $x;
    private int $y;
    static int $numObjCriados = 0;

    function __construct($x, $y) {
        $this->setX($x);
        $this->setY($y);
        $this->numObjCriados++;
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

    function getNumObjCriados() {
        return $this->numObjCriados;
    }
}