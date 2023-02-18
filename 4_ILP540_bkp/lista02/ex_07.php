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
        $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
        $nota_1 = isset($_GET['nota_1']) ? $_GET['nota_1'] : '';
        $nota_2 = isset($_GET['nota_2']) ? $_GET['nota_2'] : '';
        $nota_3 = isset($_GET['nota_3']) ? $_GET['nota_3'] : '';
        $nota_4 = isset($_GET['nota_4']) ? $_GET['nota_4'] : '';
        $exame = isset($_GET['exame']) ? $_GET['exame'] : '';

        $aux = isset($_GET['nome'], $_GET['nota_1'], $_GET['nota_4'], $_GET['nota_3'], $_GET['nota_4']) ? true : false;
        $media = $aux ? ($nota_1 + $nota_2 + $nota_3 + $nota_4) / 4 : '';
        $result = $resultFinal = '';
        
        $display = "style='display:none;'";
        if ($aux) {
            $result = $media >= 7 ? "$nome ficou com média $media e foi aprovado(a)." : "$nome ficou com média $media e ficou para exame.";
        
            if ($media < 7) {
                $display = "style='display:block;'";
                $mediaFinal = isset($_GET['exame']) ? ($media + $exame) / 2 : '';
                $resultFinal = isset($_GET['exame']) ? ($mediaFinal >= 5 ? "$nome ficou com $mediaFinal de média final e foi aprovado." : "$nome ficou com $mediaFinal de média final e foi reprovado.") : '';
            }
        }
    ?>
    <form method="get">
        <label>Nome do aluno:</label>
        <input name="nome" id="nome" type="text" value="<?= $nome ?>">
        
        <label>Nota 01:</label>
        <input name="nota_1" id="nota_1" type="number" step=".25" value="<?= $nota_1 ?>">
        
        <label>Nota 02:</label>
        <input name="nota_2" id="nota_2" type="number" step=".25" value="<?= $nota_2 ?>">
        
        <label>Nota 03:</label>
        <input name="nota_3" id="nota_3" type="number" step=".25" value="<?= $nota_3 ?>">
        
        <label>Nota 04:</label>
        <input name="nota_4" id="nota_4" type="number" step=".25" value="<?= $nota_4 ?>">
        
        <input type="submit" value="Verificar aprovação do aluno">
    </form>

    <p>Resultado final: <?= $result ?></p>

    <form method="get" <?= $display ?>>
        <input name="nome" type="hidden" value="<?= $nome ?>">
        <input name="nota_1" type="hidden" step=".25" value="<?= $nota_1 ?>">
        <input name="nota_2" type="hidden" step=".25" value="<?= $nota_2 ?>">
        <input name="nota_3" type="hidden" step=".25" value="<?= $nota_3 ?>">
        <input name="nota_4" type="hidden" step=".25" value="<?= $nota_4 ?>">

        <label for="">Nota do exame:</label>
        <input name="exame" id="exame" type="number" step=".25" value="<?= $exame ?>">

        <input type="submit" value="Verificar aprovação final">
    </form>

    <p <?= $display ?>>Aprovação final: <?= $resultFinal ?></p>
</body>
</html>