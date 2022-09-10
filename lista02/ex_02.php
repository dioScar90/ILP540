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
        $vtBrancos = isset($_GET['vtBrancos']) ? $_GET['vtBrancos'] : '';
        $vtNulos = isset($_GET['vtNulos']) ? $_GET['vtNulos'] : '';
        $vtValidos = isset($_GET['vtValidos']) ? $_GET['vtValidos'] : '';

        $percentBrancos = $percentNulos = $percentValidos = '';
        if ($vtBrancos != '' && $vtNulos != '' && $vtValidos != '') {
            $totalVotos = ($vtBrancos + $vtNulos + $vtValidos).'.';
            $percentBrancos = ($vtBrancos / $totalVotos * 100).'%';
            $percentNulos = ($vtNulos / $totalVotos * 100).'%';
            $percentValidos = ($vtValidos / $totalVotos * 100).'%';
            $percentuais = "$percentBrancos de votos brancos, $percentNulos de votos nulos e $percentValidos de votos válidos.";
        }
    ?>
    <form method="get">
        <label>Votos brancos:</label>
        <input name="vtBrancos" id="vtBrancos" type="number" min="0" step="1" value="<?= $vtBrancos ?>">
        <label>Votos nulos:</label>
        <input name="vtNulos" id="vtNulos" type="number" min="0" step="1" value="<?= $vtNulos ?>">
        <label>Votos válidos:</label>
        <input name="vtValidos" id="vtValidos" type="number" min="0" step="1" value="<?= $vtValidos ?>">
        <input type="submit" value="Calcular votos">
    </form>

    <p>Total de eleitores que votaram: <?= $totalVotos ?></p>
    <p>Percentuais: <?= $percentuais ?></p>
</body>
</html>