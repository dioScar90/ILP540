<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
</head>
<body>
    <?php
        $preco = isset($_GET['preco']) ? $_GET['preco'] : '';
        $qtde = isset($_GET['qtde']) ? $_GET['qtde'] : '';
        $total = $preco != '' && $qtde != '' ? 'R$ '.number_format(($qtde * $preco), 2, ',', '.') : '---';
    ?>
    <form method="get">
        <label>Preço (por kg):</label>
        <input name="preco" id="preco" type="number" min="0" step=".01" value="<?= $preco ?>">
        <label>Total consumido (em kg):</label>
        <input name="qtde" id="qtde" type="number" min="0" step=".001" value="<?= $qtde ?>">
        <input type="submit" value="Calcular preço final">
    </form>

    <p>Total a pagar: <?= $total ?>.</p>
</body>
</html>