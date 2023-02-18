<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $valor = isset($_GET['valor']) ? $_GET['valor'] : null;
        $tipo = isset($_GET['tipo_investimento']) ? $_GET['tipo_investimento'] : null;
        
        $preenchido = $semTipo = '';
        if (!is_null($valor) && !is_null($tipo)) {
            $semTipo = $tipo == 0 ? "<p> <strong>Erro:</strong> Seleciona um tipo de investimento. </p>" : '';
            
            if ($tipo != 0) {
                $valorFinal = $valor * ($tipo == 1 ? 1.03 : 1.04);
                $percent = $tipo == 1 ? "3% am" : "4% am";
                $rendimento = $valorFinal - $valor;
                $preenchido .= "<p> Valor final após 1 mês: <strong>R$ ".number_format($valorFinal, 2, ',', '.')."</strong>.";
                $preenchido .= "<br>Rendimento de R$ ".number_format($rendimento, 2, ',', '.')." – $percent. </p>";
            }
        }
    ?>

    <h2>Página de cálculo de investimento.</h2>
    <p>Preencha as informações abaixo e verifique quanto seu dinheiro irá render em 1 (um) mês.</p>

    <hr>

    <form method="get">
        <label for="">Valor a investir:</label>
        <input type="number" name="valor" id="valor" step=".01" required value="<?= $valor ?>">
        <label for="">Tipo de investimento:</label>
        
        <select name="tipo_investimento" id="tipo_investimento" required>
            <option value="0" style="display:none;">-- Selecione uma opção --</option>
            <option value="1" <?= $tipo == 1 ? "selected" : '' ?>>Poupança</option>
            <option value="2" <?= $tipo == 2 ? "selected" : '' ?>>Fundos de renda fixa</option>
        </select>

        <input type="submit" value="Calcular">
    </form>

    <?= $preenchido ?>
    <?= $semTipo ?>
</body>
</html>