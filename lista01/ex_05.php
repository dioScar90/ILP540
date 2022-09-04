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
        $aux = $nota_1 != '' && $nota_2 != '' && $nota_3 != '' && $nota_4 != '' ? true : false;
        $media = $aux ? ($nota_1 + $nota_2 + $nota_3 + $nota_4) / 4 : '';
        $result = '';
        if ($aux) 
            $result = $media >= 7 ? "$nome ficou com média $media e foi aprovado(a)." : "$nome ficou com média $media e foi reprovado(a).";
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
</body>
</html>