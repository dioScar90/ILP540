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
        $ladoA = isset($_GET['ladoA']) ? $_GET['ladoA'] : '';
        $ladoB = isset($_GET['ladoB']) ? $_GET['ladoB'] : '';
        $ladoC = isset($_GET['ladoC']) ? $_GET['ladoC'] : '';
        $triangulo = false;
        if (isset($_GET['ladoA'], $_GET['ladoB'], $_GET['ladoC']) && $ladoA < ($ladoB + $ladoC) && $ladoB < ($ladoA + $ladoC) && $ladoC < ($ladoA + $ladoB)) {
            $triangulo = true;
        }

        $msg = '';
        if ($triangulo == true) {
            if ($ladoA == $ladoB && $ladoB == $ladoC && $ladoC == $ladoA) {
                $msg = 'O triângulo é equilátero.';
            }
            else if ($ladoA != $ladoB && $ladoB != $ladoC && $ladoC != $ladoA) {
                $msg = 'O triângulo é escaleno.';
            }
            else {
                $msg = 'O triângulo é isósceles.';
            }
        }
        else {
            $msg = 'As medidas informadas não correspondem a um triângulo.';
        }
    ?>
    <p>Informe as medidas do triângulo (em cm):</p>

    <form method="get">
        <label>Lado A:</label>
        <input name="ladoA" id="ladoA" type="number" min="0" step="1" value="<?= $ladoA ?>">
        <label>Lado B:</label>
        <input name="ladoB" id="ladoB" type="number" min="0" step="1" value="<?= $ladoB ?>">
        <label>Lado C:</label>
        <input name="ladoC" id="ladoC" type="number" min="0" step="1" value="<?= $ladoC ?>">
        <input type="submit" value="Verificar resultado">
    </form>

    <p>Resultado: <?= $msg ?></p>
</body>
</html>