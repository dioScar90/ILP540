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
        echo "<h3>Tabuadas de 1 a 100:</h3>";

        function tabuada($fat){
            echo "<h5>Tabuada do $fat</h5>";
            echo "<p>";
            for ($i = 1; $i <= 10; $i++) {
                $prod = $fat * $i;
                echo ($i == 1 ? "" : "<br>")."$fat x $i = ".number_format($prod, 0, ',', '.');
            }
            echo "</p>";
        }

        $fat = 1;
        do {
            tabuada($fat);
            $fat++;
        } while ($fat <= 100);
    ?>
</body>
</html>