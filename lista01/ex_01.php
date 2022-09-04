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
        $pago = isset($_GET['pago']) ? $_GET['pago'] : '';
        $troco = $preco != '' && $pago != '' ? 'R$ '.number_format(($pago - $preco), 2, ',', '.') : '---';
    ?>
    <form method="get">
        <label>Preço do produto:</label>
        <input name="preco" id="preco" type="number" min="0" step=".01" value="<?= $preco ?>">
        <label>Valor pago:</label>
        <input name="pago" id="pago" type="number" min="0" step=".01" value="<?= $pago ?>">
        <input type="submit" value="Calcular troco">
        <p>Troco: <?= $troco ?>.</p>
    </form>
</body>
</html>