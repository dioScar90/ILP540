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
        $texto = isset($_GET['texto']) ? UTF8_decode($_GET['texto']) : '';
        $textoParaEditar = strtolower($texto);
        $palavra = isset($_GET['palavra']) ? strtolower($_GET['palavra']) : '';

        $display = "style='display:none;'";
        $posInicial = $posFinal = $letras = "...";
        $arrLetras = $arrLetUniq = $arrPalavras = array();
        if (isset($_GET['texto'], $_GET['palavra'])) {
            $posicaoDaPalavra = strpos($textoParaEditar, $palavra);
            if ($posicaoDaPalavra != false) {
                $posInicial = $posicaoDaPalavra;
                $posFinal = $posicaoDaPalavra + strlen($palavra);
                $textoSemEspaços = str_replace(" ", "", trim($textoParaEditar));
                $letras = strlen($textoSemEspaços);
                $arrPalavras = explode(" ", $textoParaEditar);
                
                $arrLetras = str_split($textoSemEspaços);

                $arrLetUniq = array_unique($arrLetras);
                foreach ($arrLetUniq as $key => $item) {
                    count(array_keys($arrLetras, $item));
                }
            }
        }
    ?>
    <form method="get">
        <label>Informe um texto:</label>
        <input name="texto" type="text" value="<?= $texto ?>">

        <label>Informe uma palavra desse texto:</label>
        <input name="palavra" type="text" value="<?= $palavra ?>">

        <input type="submit" value="Começar">
    </form>
    
    <p>Texto: <strong><?= $texto ?></strong>.</p>
    <p>A palavra <strong><?= $palavra ?></strong> começa na posição <?= $posInicial ?> e termina na posição <?= $posFinal ?>.</p>
    <p>O texto possui <?= $letras ?> letras (desconsiderando os espaços) e <?php echo !empty($arrPalavras) ? sizeof($arrPalavras) : "..."; ?> palavras.</p>
    <h4>Letras e ocorrência delas no texto:</h4>
    <?php
        if (isset($_GET['texto'], $_GET['palavra'])) {
            echo "<p>";
            foreach ($arrLetUniq as $key => $item) {
                echo reset($arrLetUniq) == $item ? "" : "<br>";
                $qtdeLetras = count(array_keys($arrLetras, $item));
                echo "Letra <strong>$item</strong> aparece $qtdeLetras vez(es).";
            }
            echo "</p>";
        }
    ?>
</body>
</html>