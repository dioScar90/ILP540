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
        $valor = isset($_GET['valor']) ? $_GET['valor'] : '';
        $result = '';
        if ($valor != '' && $valor > 10)
            $result = 'O valor é maior que 10.';
        else if ($valor != '' && $valor < 10)
            $result = 'O valor é menor que 10.';
        else if ($valor != '' && $valor == 10)
            $result = 'O valor é igual a 10.';
        else
            $result = '';
    ?>
    <form method="get">
        <label>Digite um número:</label>
        <input name="valor" id="valor" type="number" value="<?= $valor ?>">
        <input type="submit" value="Verificar">
    </form>

    <p><?= $result ?></p>
</body>
</html>