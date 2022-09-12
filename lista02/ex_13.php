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
        $qtde = isset($_GET['qtde']) ? $_GET['qtde'] : "";

        $numbers = array();
        $soma = $media = $maior = $maiorIdx = $menor = $menorIdx = 0;
        $elementos = '';
        $display = "style='display:none;'";
        if (isset($_GET['qtde']) && $qtde > 0) {
            for ($i = 0; $i < $qtde; $i++) {
                $aux = rand(1,2000);
                array_push($numbers, $aux);
            }

            foreach ($numbers as $key => $item) {
                $elementos .= reset($numbers) == number_format($item, 0, ',', '.') ? $item : ', '.number_format($item, 0, ',', '.');

                $soma += $item;

                if ($key == 0) {
                    $maior = $menor = $item;
                    $maiorIdx = $menorIdx = $key;
                }
                else {
                    $maiorIdx = $item > $maior ? $key : $maiorIdx;
                    $maior = $item > $maior ? $item : $maior;

                    $menorIdx = $item < $menor ? $key : $menorIdx;
                    $menor = $item < $menor ? $item : $menor;
                }
            }
            $media = $soma / $qtde;
            $display = "style='display:block;'";
        }
    ?>
    <form method="get">
        <label>Informe a quantidade de números inteiros:</label>
        <input name="qtde" type="number" min="1" step="1" value="<?= $qtde ?>">

        <input type="submit" value="Começar">
    </form>

    <div <?= $display ?>>
        <p>Elementos: <?= $elementos ?>.</p>
        <p>Soma dos números: <?= number_format($soma, 0, ',', '.') ?>.</p>
        <p>Média dos números: <?= number_format($media, 0, ',', '.') ?>.</p>
        <p>Maior: <?= number_format($maior, 0, ',', '.') ?>, posição <?= $maiorIdx ?>.</p>
        <p>Menor: <?= number_format($menor, 0, ',', '.') ?>, posição <?= $menorIdx ?>.</p>
    </div>
</body>
</html>