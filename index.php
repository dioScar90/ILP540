<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Principal – aula ILP540</title>
</head>
<body>
    <?php
        $foo = 'Bob';
        $bar = &$foo;
        $bar = "My name is $bar";
        echo $bar;
        echo '<br>';
        echo $foo;
        echo '<br>';
        var_dump($foo);
        
        if (isset($_GET['username']) && isset($_GET['email'])) {
            $nome = $_GET['username'];
            $email = $_GET['email'];
        }
        echo '<br>';
        echo "Nome: $nome - Email: $email";
    ?>
</body>
</html>