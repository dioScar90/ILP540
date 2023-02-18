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
        function fibonacci($q, $zero = false){
            if($q >= 2){ 
                $f = ($zero) ? [0,1] : [1,1]; 
                for($i = 2; $i < $q; $i++){
                    $f[$i] = $f[$i-1] + $f[$i-2];		
                }
                return $f;
            }
            return ($q == 1) ? [1] : [];
        }

        $fib = fibonacci(25, true);
    ?>
    <h4>Série Fibonacci até o 25º termo:</h4>
    <p>
    <?php
        foreach($fib as $key => $item) {
            echo (reset($fib) == $item) ? number_format($item, 0, ',', '.') : ', '.number_format($item, 0, ',', '.');
            echo (end($fib) == $item) ? '.' : '';
        }
    ?>
    </p>
</body>
</html>