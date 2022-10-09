<?php
session_start();

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}

if($_POST){
    $local = isset($_POST["local"]) ? $_POST["local"] : "";
    $datahora = isset($_POST["datahora"]) ? $_POST["datahora"] : "";
    $datahora = date("d/m/Y H:i:s", strtotime($datahora));
    $compromisso = isset($_POST["compromisso"]) ? $_POST["compromisso"] : "";

    $arquivo = file_get_contents("compromissos.json");
    $array = json_decode($arquivo);

    array_push($array, array(
        "adm_login" => $_SESSION["adm_login"],
        "compromisso" => $compromisso,
        "local" => $local,
        "data_hora" => $datahora,
    ));

    $file = fopen("compromissos.json", "w");
    $mensagem = fwrite($file, json_encode($array)) ? "Cadastrado com sucesso" : "Erro ao cadastrar";



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
                <h1>Cadastrar compromissos</h1>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <a href="home.php" class="btn btn-primary">Voltar</a>
            </div>

            <form method="post">
                <input type="text" name="compromisso" id="compromisso" placeholder="Compromisso" class="form-control" required>
                <input type="text" name="local" id="local" placeholder="Local" class="form-control"required>
                <input type="datetime-local" name="datahora" id="datahora" placeholder="Data e Hora" class="form-control" required>
                <input type="submit" value="Cadastrar" class="btn btn-primary w100">

            </form>

            <?php
            
            if(isset($mensagem)) {
                echo $mensagem;
            }
            
            ?>


        </div>
    </div>

</body>

</html>