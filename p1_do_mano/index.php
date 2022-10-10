<?php

session_start();

if (isset($_SESSION["adm_login"])) {
    header("Location: home.php");
}

if (isset($_POST["login"], $_POST["senha"])) {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $csv = array_map('str_getcsv', file('users.csv'));
    foreach ($csv as $row) {
        if ($login == $row[0]) {
            if ($senha == $row[1]) {
                $_SESSION["adm_login"] = $login;
                header("Location: home.php");
            } 
        }
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P1 de PhP - Diogo L Scarmagnani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #333;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="box">
        <h1 class="text-center">Meus compromissos</h1>
       
        <form method="post">
            <input type="text" class="form-control" name="login" id="login" placeholder="Login">
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
            <input type="submit" value="Entrar" class="btn btn-primary btn-lg w100">

        </form>
    </div>

</body>

</html>