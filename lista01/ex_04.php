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
        $verif = '';
        if ($valor != '' && $valor > 0)
            $verif = 'positivo';
        else if ($valor != '' && $valor < 0)
            $verif = 'negativo';
        else if ($valor != '' && $valor == 0)
            $verif = 'igual a zero';
        else
            $verif = '';
        $result = $verif == '' ? '' : "O valor digitado é $verif.";
    ?>
    <form method="get">
        <label>Digite um número:</label>
        <input name="valor" id="valor" type="number" value="<?= $valor ?>">
        <input type="submit" value="Verificar">
        <p><?= $result ?></p>
    </form>
</body>
</html>