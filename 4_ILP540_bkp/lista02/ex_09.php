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
        $i = 1;
        $j = 1;
        do {
            $k = $i + 1;
            $j = $j + $k;
            $i++;
        } while ($i < 100);
        $soma = number_format($j, 0, ',', '.');
    ?>
    <h4>Total da soma dos 100 primeiros números inteiros:</h4>
    <p><?= $soma ?>.</p>
</body>
</html>