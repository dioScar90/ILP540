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
        $idade = isset($_GET['idade']) ? $_GET['idade'] : '';

        $msg = '';
        if (isset($_GET['idade']) && $idade >= 5) {
            if ($idade >= 5 && $idade <= 7) {
                $msg = 'Infantil A.';
            }
            else if ($idade >= 8 && $idade <= 11) {
                $msg = 'Infantil B.';
            }
            else if ($idade >= 12 && $idade <= 13) {
                $msg = 'Juvenil A.';
            }
            else if ($idade >= 14 && $idade <= 17) {
                $msg = 'Juvenil B.';
            }
            else if ($idade >= 18) {
                $msg = 'Adulto.';
            }
        }
    ?>
    <form method="get">
        <label>Informe a idade do nadador:</label>
        <input name="idade" id="idade" type="number" min="5" step="1" value="<?= $idade ?>">
        <input type="submit" value="Verificar resultado">
    </form>

    <p>Resultado: <?= $msg ?></p>
</body>
</html>