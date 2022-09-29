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
        $display = "style='display:none;'";
        $arrLetras = $arrLetUniq = array();

        $texto = isset($_GET['texto']) ? trim($_GET['texto']) : '';
        $palavra = isset($_GET['palavra']) ? trim($_GET['palavra']) : '';

        /**
         * Aqui substituí todos os caracteres acentuados pois estava dando conflito no for(), estava trazendo
         * um  caractere � sempre que aparecia alguma letra acentuada. Provavelmente algum problema de UTF-8
         * mas não consegui resolver de forma nativa, então fiz essa POG.
         */
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î',
            'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å',
            'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i',
            'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A',
            'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
        $textoParaEditar = strtolower(
            str_replace($comAcentos, $semAcentos, $texto)
        );
        
        if (isset($_GET['texto'], $_GET['palavra'])) {
            $pos = strpos($textoParaEditar, $palavra);
            if ($pos != false) {
                $palavraStart = $pos;
                $palavraEnd = $pos + strlen($palavra);
                $letras = strlen($textoParaEditar);
                $arrPalavras = preg_split("/[\s,.;:_!?]+/", $textoParaEditar);
                $textoSemEspeciais = preg_replace("/[\s,.;:_!?]+/", '', $textoParaEditar);
                
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
        <p>O texto possui <?= $letras ?> caracteres (considerando os espaços, pontuações e caracteres especiais) e <?= sizeof($arrPalavras) ?> palavras.</p>
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