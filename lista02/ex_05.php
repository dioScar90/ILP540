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
        $numero = isset($_GET['numero']) ? $_GET['numero'] : '';
        $inteiro = $par = $positivo = false;
        if (isset($_GET['numero'])) {
            $inteiro = $numero == (int)$numero ? true : false;
            $par = $numero % 2 == 0 ? true : false;
            $positivo = $numero >= 0 ? true : false;

            $msg = '';
            if ($inteiro == true) {
                if ($par == true && $positivo == true) {
                    $msg = 'O número informado é par e positivo.';
                }
                else if ($par == true && $positivo == false) {
                    $msg = 'O número informado é par e negativo.';
                }
                else if ($par == false && $positivo == true) {
                    $msg = 'O número informado é ímpar e positivo.';
                }
                else {
                    $msg = 'O número informado é ímpar e negativo.';
                }
            }
            else {
                $msg = 'Não foi informado um número inteiro.';
            }
        }
    ?>
    <form method="get">
        <label>Informe um número inteiro:</label>
        <input name="numero" id="numero" type="number" step="1" value="<?= $numero ?>">
        <input type="submit" value="Verificar número">
    </form>

    <p>Resultado: <?= $msg ?></p>
</body>
</html>