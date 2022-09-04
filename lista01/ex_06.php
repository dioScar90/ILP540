<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
    <style>
        div.inline {
            display: inline-block;
            width: 11%;
        }

        label.cinza {
            font-size: 0.8em;
            color: #ced4da;
        }

        .small {
            font-size: small;
        }

        .center {
            text-align: center;
        }

        table {
            max-width: 600px;
        }

        button[type="submit"] {
            margin: 10px 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php
        $peso = isset($_GET['peso']) ? $_GET['peso'] : '';
        $altura = isset($_GET['altura']) ? $_GET['altura'] : '';
        $imc = $peso != '' && $altura != '' ? number_format(($peso / ($altura * 2)), 1, ',', '.') : '';
    ?>

    <h1>Cálculo IMC</h1>

    <p>IMC é a sigla para Índice de Massa Corpórea, parâmetro adotado pela Organização Mundial de Saúde para calcular o peso ideal de cada pessoa.</p>
    <p>O índice é calculado da seguinte maneira: divide-se o peso do paciente pela sua altura elevada ao quadrado. Diz-se que o indivíduo tem peso normal quando o resultado do IMC está entre 18,5 e 24,9.</p>
    <p>Quer descobrir seu IMC? Insira seu peso e sua altura nos campos abaixo e compare com os índices da tabela. Importante: siga os exemplos e use pontos como separadores.</p>

    <form action="">
        <div>
            <div class="inline">
                <label class="cinza">Peso <span class="small">(ex.: 1,70)</span></label>
                <input type="number" name="peso" id="peso" class="form-control" placeholder="Peso" min="0" step=".001" value="<?= $peso ?>">
            </div>
            <div class="inline">
                <label class="cinza">Altura <span class="small">(ex.: 69,2)</span></label>
                <input type="number" name="altura" id="altura" class="form-control" placeholder="Altura" min="0" step=".01" value="<?= $altura ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
        <button style="cursor:auto;" type="button" class="btn btn-warning"><span>Seu IMC é:&nbsp;<strong><?= $imc ?></strong>.</span></button>
    </form>

    

    <table class="table table-striped table-hover">
        <thead>
            <tr class="center">
                <th scope="col" colspan="3" class="center">VEJA A INTERPRETAÇÃO DO IMC</th>
            </tr>
            <tr>
                <th scope="col">IMC</th>
                <th scope="col">CLASSIFICAÇÃO</th>
                <th scope="col">OBESIDADE <span class="small">(GRAU)</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MENOR QUE 18,5</td>
                <td>MAGREZA</td>
                <td>0</td>
            </tr>
            <tr>
                <td>ENTRE 18,5 E 24,9</td>
                <td>NORMAL</td>
                <td>0</td>
            </tr>
            <tr>
                <td>ENTRE 25,0 E 29,9</td>
                <td>SOBREPESO</td>
                <td>I</td>
            </tr>
            <tr>
                <td>ENTRE 30,0 E 39,9</td>
                <td>OBESIDADE</td>
                <td>II</td>
            </tr>
            <tr>
                <td>MAIOR QUE 40,0</td>
                <td>OBESIDADE GRAVE</td>
                <td>III</td>
            </tr>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>