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
        $texto = isset($_GET['texto']) ? $_GET['texto'] : '';
        $palavra = isset($_GET['palavra']) ? $_GET['palavra'] : '';

        $display = "style='display:none;'";
        $arrLetras = $arrLetUniq = array();
        if (isset($_GET['texto'], $_GET['palavra'])) {
            $pos = strpos($texto, $palavra);
            if ($pos != false) {
                $palavraStart = $pos;
                $palavraEnd = $pos + strlen($palavra);
                $letras = strlen($texto);
                $arrPalavras = preg_split("/[\s,.;:_!?]+/", $texto);
                $textoSemEspeciais = preg_replace("/[\s,.;:_!?]+/", '', $texto);

                for ($i = 0; $i < strlen($textoSemEspeciais); $i++) {
                    if ($textoSemEspeciais[$i] != "/[\s,.;:_!?]+/") {
                        array_push($arrLetras, $textoSemEspeciais[$i]);
                    }
                }

                $arrLetUniq = array_unique($arrLetras);
                foreach ($arrLetUniq as $key => $item) {
                    count(array_keys($arrLetras, $item));
                }
            }

            $display = "style='display:block;'";
        }
    ?>
    <form method="get">
        <label>Informe um texto:</label>
        <input name="texto" type="text" value="<?= $texto ?>">

        <label>Informe uma palavra desse texto:</label>
        <input name="palavra" type="text" value="<?= $palavra ?>">

        <input type="submit" value="Começar">
    </form>

    <div <?= $display ?>>
        <p>Texto: <strong><?= $texto ?></strong>.</p>
        <p>A palavra <strong><?= $palavra ?></strong> começa na posição <?= $palavraStart ?> e termina na posição <?= $palavraEnd ?>.</p>
        <p>O texto possui <?= $letras ?> letras (considerando os espaços, pontuações e caracteres especiais) e <?= sizeof($arrPalavras) ?> palavras.</p>
        <h4>Letras e ocorrência delas no texto:</h4>
        <?php
            if (isset($_GET['texto'], $_GET['palavra'])) {
                echo "<p>";
                foreach ($arrLetUniq as $key => $item) {
                    echo reset($arrLetUniq) == $item ? "" : "<br>";
                    $qtdeLetras = count(array_keys($arrLetras, $item));
                    $quantasVezes = $qtdeLetras > 1 ? "$qtdeLetras vezes" : "$qtdeLetras vez";
                    echo "Letra <strong>$item</strong> aparece $quantasVezes.";
                }
                echo "</p>";
            }
        ?>
    </div>
</body>
</html>