<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <?php
        $fileName = "nome_aluno.txt";
        $file = fopen($fileName, "w")
            or die("Falha na abertura do arquivo!");

        $content = "Palmeiras – tricampeão da Libertadores (1999, 2020, 2021)."
                    ."\nPalmeiras – tetracampeão da Copa do Brasil (1998, 2012, 2015, 2020)."
                    ."\nPalmeiras – hendecacampeão brasileiro (1960, 1967[0], 1967[1], 1969, 1972, 1973, 1993, 1994, 2016, 2018, 2022).";
        if(!empty($file))
            echo "<p> Arquivo ($fileName) gerado com sucesso. </p>";

        fwrite($file, $content);
        fclose($file);
    ?>
    
    <p> Para imprimir o arquivo, <a href="?aux=1">clique aqui</a>. </p>

    <?php
        if (isset($_GET['aux'])){
            $newContent = str_replace("\n", "<br>", file_get_contents($fileName));

            echo "<p> $newContent </p>";
        }
    ?>
</body>
</html>