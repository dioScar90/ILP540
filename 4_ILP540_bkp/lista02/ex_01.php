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
        $kmInicial = isset($_GET['kmInicial']) ? $_GET['kmInicial'] : '';
        $kmFinal = isset($_GET['kmFinal']) ? $_GET['kmFinal'] : '';
        $ltConsumidos = isset($_GET['ltConsumidos']) ? $_GET['ltConsumidos'] : '';
        $precoLitro = isset($_GET['precoLitro']) ? $_GET['precoLitro'] : '';

        $distPercorrida = $totalGasto = $consumoCarro = '';
        if ($kmInicial != '' && $kmFinal != '' && $ltConsumidos != '' && $precoLitro != '') {
            $distPercorrida = ($kmFinal - $kmInicial).' km.';
            $totalGasto = 'R$ '.number_format(($ltConsumidos * $precoLitro), 2, ',', '.').'.';
            $consumoCarro = ($distPercorrida / $ltConsumidos).' km/L.';
        }
    ?>
    <form method="get">
        <label>Quilometragem inicial:</label>
        <input name="kmInicial" id="kmInicial" type="number" min="0" step=".001" value="<?= $kmInicial ?>">
        <label>Quilometragem final:</label>
        <input name="kmFinal" id="kmFinal" type="number" min="0" step=".001" value="<?= $kmFinal ?>">
        <label>Litros consumidos:</label>
        <input name="ltConsumidos" id="ltConsumidos" type="number" min="0" step=".001" value="<?= $ltConsumidos ?>">
        <label>Preço por litro:</label>
        <input name="precoLitro" id="precoLitro" type="number" min="0" step=".001" value="<?= $precoLitro ?>">
        <input type="submit" value="Calcular">
    </form>

    <p>Distância percorrida: <?= $distPercorrida ?></p>
    <p>Valor total gasto: <?= $totalGasto ?></p>
    <p>Consumo do carro: <?= $consumoCarro ?></p>
</body>
</html>