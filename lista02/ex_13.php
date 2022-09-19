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
        $qtde = isset($_GET['qtde']) ? $_GET['qtde'] : "0";
        $outrosGets = false;
        for ($i = 0, $j = 1; $i < $qtde; $i++, $j++) {
            $aux = "num".$j;
            $outrosGets = isset($_GET[$aux]) ? true : false;
        }

        $numbers = array();
        $soma = $media = $maior = $maiorIdx = $menor = $menorIdx = 0;
        $elementos = '';
        $display = "style='display:none;'";
        if (isset($_GET['qtde']) && $qtde > 0 && $outrosGets == true) {
            for ($i = 0, $j = 1; $i < $qtde; $i++, $j++) {
                $aux = "num".$j;
                $num = $_GET[$aux];
                array_push($numbers, $num);
            }

            foreach ($numbers as $key => $item) {
                $elementos .= reset($numbers) == $item ? number_format($item, 0, ',', '.') : ', '.number_format($item, 0, ',', '.');

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

            $maiorIdx++;
            $menorIdx++;
            $media = $soma / $qtde;
            $display = "style='display:block;'";
        }
    ?>
    <form method="get">
        <label>Quantos números deseja incluir?</label><br>
        <input name="qtde" type="number" min="1" step="1" value="<?= $qtde ?>">

        <input type="submit" value="Ok">
    </form>

    
    <?php
        if (!empty($qtde)) {
            echo "<form method='get'>";
            echo "<input name='qtde' type='hidden' value='$qtde'>";
            $numeros = array();
            for ($i = 0, $j = 1; $i < $qtde; $i++, $j++) {
                echo "<label>".$j."º número:</label>";
                echo "<input name='num".$j."' type='number' min='1' step='1' value='".(!empty($numbers) ? $numbers[$i] : '')."'><br>";
            }
            echo "<input type='submit' value='Incluir'>";
            echo "</form>";
        }
    ?>
    

    <div <?= $display ?>>
        <p>Elementos: <?= $elementos ?>.</p>
        <p>Soma dos números: <?= number_format($soma, 0, ',', '.') ?>.</p>
        <p>Média dos números: <?= number_format($media, 0, ',', '.') ?>.</p>
        <p>Maior: <?= number_format($maior, 0, ',', '.') ?> – <?= $maiorIdx ?>º número.</p>
        <p>Menor: <?= number_format($menor, 0, ',', '.') ?> – <?= $menorIdx ?>º número.</p>
    </div>
</body>
</html>