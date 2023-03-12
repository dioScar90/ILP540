<?php
class Funcionario {
    private string $nome;
    private int $codigo;
    private float $salarioBase;

    function __construct(int $codigo, string $nome, float $salarioBase) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome(string $nome) {
        $this->nome = $nome;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo(int $codigo) {
        $this->codigo = $codigo;
    }

    function getSalarioBase() {
        return $this->salarioBase;
    }

    function setSalarioBase(float $salarioBase) {
        $this->salarioBase = $salarioBase;
    }

    function getSalarioLiquido() {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;

        if ($this->salarioBase > 2000) {
            $ir = ($this->salarioBase - 2000) * 0.12;
        }

        return $this->salarioBase - $inss - $ir;
    }
}

class Servente extends Funcionario {
    private float $adicionalInsalubridade = 1.05;

    function __construct(int $codigo, string $nome, float $salarioBase) {
        $salarioBase *= $this->adicionalInsalubridade;
        parent::__construct($codigo, $nome, $salarioBase);
    }
}

class Motorista extends Funcionario {
    private string $carteiraMotorista;

    function __construct(int $codigo, string $nome, float $salarioBase, string $carteiraMotorista) {
        $this->carteiraMotorista = $carteiraMotorista;
        parent::__construct($codigo, $nome, $salarioBase);
    }

    function getCarteiraMotorista() {
        return $this->carteiraMotorista;
    }

    function setCarteiraMotorista(string $carteiraMotorista) {
        $this->carteiraMotorista = $carteiraMotorista;
    }
}

class MestreDeObras extends Servente {
    private int $qtdeFuncionariosSobSupervisao;
    private float $adicional = 1.0;

    function __construct(int $codigo, string $nome, float $salarioBase, string $carteiraMotorista, int $qtdeFuncionariosSobSupervisao) {
        $this->setQtdeFuncionariosSobSupervisao($qtdeFuncionariosSobSupervisao);
        $salarioBase *= $this->adicional;
        parent::__construct($codigo, $nome, $salarioBase, $carteiraMotorista);
    }

    function getQtdeFuncionariosSobSupervisao() {
        return $this->qtdeFuncionariosSobSupervisao;
    }

    function setQtdeFuncionariosSobSupervisao(int $qtdeFuncionariosSobSupervisao) {
        $qtdeGruposDeDez = $qtdeFuncionariosSobSupervisao < 10 ? 0 : floor($qtdeFuncionariosSobSupervisao / 10);
        $this->adicional = 1 + ($qtdeGruposDeDez / 10);
    }
}