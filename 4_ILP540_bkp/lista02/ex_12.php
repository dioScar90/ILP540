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
        $numbers = array();
        for ($i = 0; $i < 50; $i++) {
            $aux = rand(10,500);
            array_push($numbers, $aux);
        }
        sort($numbers);
        
        $pares = $primos = 0;
        foreach ($numbers as $key => $item) {
            $par = ($item % 2) == 0 ? true : false;
            if ($par == true) {
                $pares++;
            }

            $auxPrimos = 0;
            for ($i = 1; $i <= $item; $i++) {
                $resto = $item % $i;
                $auxPrimos += $resto == 0 ? 1 : 0;
            }
            if ($auxPrimos == 2) {
                $primos++;
            }
        }
    ?>
    <h3>50 números inteiros:</h3>
    <p>
    <?php
        foreach ($numbers as $key => $item) {
            echo reset($numbers) == $item ? $item : ', '.$item;
            echo end($numbers) == $item ? '.' : '';
        }
    ?>
    </p>
    <p>Foram <?= $pares ?> número(s) par(es) e <?= $primos ?> número(s) primo(s).</p>
</body>
</html>