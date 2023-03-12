<?php
abstract class Telefone {
    protected int $ddd;
    protected int $nonoDigito = 9;
    protected int $primeiraParte;
    protected int $segundaParte;

    function __construct(int $ddd, int $primeiraParte, int $segundaParte) {
        $this->ddd = $ddd;
        $this->primeiraParte = $primeiraParte;
        $this->segundaParte = $segundaParte;
    }

    private function strPad($str, $length) {
        return str_pad($str, $length, '0', STR_PAD_LEFT);
    }

    function getNumeroTelefone() {
        $ddd = $this->strPad($this->ddd, 2);
        $num1 = $this->nonoDigito . ' ' . $this->strPad($this->primeiraParte, 4);
        $num2 = $this->strPad($this->segundaParte, 4);

        $numeroInteiro = "({$ddd}) {$num1}-{$num2}";

        return $numeroInteiro;
    }

    function setNumeroTelefone(int $ddd, int $primeiraParte, int $segundaParte) {
        $this->ddd = $ddd;
        $this->primeiraParte = $primeiraParte;
        $this->segundaParte = $segundaParte;
    }

    abstract function calculaCusto(int $tempoLigacaoEmMinutos);
}

class Fixo extends Telefone {
    private float $custoPorMinuto;

    function __construct(int $ddd, int $primeiraParte, int $segundaParte, float $custoPorMinuto) {
        parent::__construct($ddd, $primeiraParte, $segundaParte);
        $this->custoPorMinuto = $custoPorMinuto;
    }

    function calculaCusto(int $tempoLigacaoEmMinutos) {
        return $this->custoPorMinuto * $tempoLigacaoEmMinutos;
    }
}

abstract class Celular extends Telefone {
    protected float $custoPorMinuto;
    protected string $nomeOperadora;

    function __construct(int $ddd, int $primeiraParte, int $segundaParte, float $custoPorMinuto, string $nomeOperadora) {
        parent::__construct($ddd, $primeiraParte, $segundaParte);
        $this->custoPorMinuto = $custoPorMinuto;
        $this->nomeOperadora = $nomeOperadora;
    }

    abstract function calculaCusto(int $tempoLigacaoEmMinutos);
}

class PrePago extends Celular {
    function __construct(int $ddd, int $primeiraParte, int $segundaParte, float $custoPorMinuto, string $nomeOperadora) {
        parent::__construct($ddd, $primeiraParte, $segundaParte, $custoPorMinuto, $nomeOperadora);
    }

    function calculaCusto(int $tempoLigacaoEmMinutos) {
        return $tempoLigacaoEmMinutos * ($this->custoPorMinuto * 1.4);
    }
}

class PosPago extends Celular {
    function __construct(int $ddd, int $primeiraParte, int $segundaParte, float $custoPorMinuto, string $nomeOperadora) {
        parent::__construct($ddd, $primeiraParte, $segundaParte, $custoPorMinuto, $nomeOperadora);
    }

    function calculaCusto(int $tempoLigacaoEmMinutos) {
        return $tempoLigacaoEmMinutos * ($this->custoPorMinuto * 0.9);
    }
}