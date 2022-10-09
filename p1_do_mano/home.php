<?php
session_start();

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P1 de PhP - Diogo L Scarmagnani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <nav class="navbar navbar-light bg-dark">
        <div class="row" style="width:100%; padding:7.5px;">
            <div class="col-md-6">
                <span class="navbar-brand mb-0 h1" style="color:white">Meus Compromissos</span>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <a class="btn btn-primary" href="logout.php">Sair</a>
            </div>
        </div>


    </nav>

    <div class="container" style="margin-top:50px">

        <div class="row">
            <div class="col-md-6">
                <h1>Gerenciar compromissos</h1>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <a href="cadastrar-compromisso.php" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Data e Hora</th>
                    <th scope="col">Compromisso</th>
                    <th scope="col">Local</th>
                    <td scope="col">Ações</td>
                </tr>
            </thead>
            <tbody>

                <?php

                $arquivo = file_get_contents("compromissos.json");
                $array = json_decode($arquivo);

                foreach ($array as $row) {

                    if ($row->adm_login == $_SESSION["adm_login"]) {
                ?>
                        <tr>
                            <td><?= $row->data_hora ?></td>
                            <td><?= $row->compromisso ?></td>
                            <td><?= $row->local ?></td>
                            <td>
                                <a href="excluir-compromisso.php?compromisso=<?=$row->compromisso?>&local=<?=$row->local?>&datahora=<?=$row->data_hora?>" class="btn btn-danger">&#x1f5d1;</a>
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>


            </tbody>
        </table>



    </div>


    <h1></h1>

</body>

</html>