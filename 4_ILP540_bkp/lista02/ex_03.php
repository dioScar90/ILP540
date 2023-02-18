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
        $prestTotal = isset($_GET['prestTotal']) ? $_GET['prestTotal'] : '';
        $prestPagas = isset($_GET['prestPagas']) ? $_GET['prestPagas'] : '';
        $prestValor = isset($_GET['prestValor']) ? $_GET['prestValor'] : '';

        $totalFinanciamento = $prestRestantes = $dividaRestante = '';
        if ($prestTotal != '' && $prestPagas != '' && $prestValor != '') {
            $totalFinanciamento = $prestTotal * $prestValor;
            $prestRestantes = ($prestTotal - $prestPagas).'.';
            $dividaRestante = 'R$ '.number_format(($prestRestantes * $prestValor), 2, ',', '.').'.';
        }
    ?>
    <form method="get">
        <label>Total de prestações do financiamento:</label>
        <input name="prestTotal" id="prestTotal" type="number" min="0" step="1" value="<?= $prestTotal ?>">
        <label>Prestações pagas:</label>
        <input name="prestPagas" id="prestPagas" type="number" min="0" step="1" value="<?= $prestPagas ?>">
        <label>Valor de cada prestação:</label>
        <input name="prestValor" id="prestValor" type="number" min="0" step="1" value="<?= $prestValor ?>">
        <input type="submit" value="Calcular prestações">
    </form>

    <p>Saldo devedor atual: <?= $dividaRestante ?></p>
    <p>Prestações a pagar: <?= $prestRestantes ?></p>
</body>
</html>