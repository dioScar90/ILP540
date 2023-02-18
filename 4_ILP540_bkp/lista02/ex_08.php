<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
</head>
<body>
    <h3>Quadrados dos números inteiros de 15 a 200:</h3>
    <?php
        $i = 15;
        while ($i <= 200) {
            $num = $i;
            $quad = number_format(($num ** 2), 0, ',', '.');
    ?>
            <p><?= $num ?>² = <?= $quad ?></p>
    <?php
            $i++;
        }
    ?>
</body>
</html>