<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    // if (!isset($_SESSION["login"])) {
    //     header("Location: index.php");
    // }

    include_once "header.php";
    include_once "menu.php";

    if(isset($_POST["local"], $_POST["datahora"], $_POST["compromisso"])){
        $local = $_POST["local"];
        $datahora = date("d/m/Y H:i:s", strtotime($_POST["datahora"]));
        $compromisso = $_POST["compromisso"];
    
        $arquivo = is_file("compromissos.json") ? file_get_contents("compromissos.json") : "[]";
        $arrCompromissos = json_decode($arquivo);
        $lastId = isset(end($arrCompromissos)->id) ? end($arrCompromissos)->id : 0;
    
        array_push($arrCompromissos, array(
            "id" => $lastId + 1,
            "user" => $_SESSION["login"],
            "compromisso" => $compromisso,
            "local" => $local,
            "data_hora" => $datahora,
        ));
    
        $file = fopen("compromissos.json", "w");
        $mensagem = fwrite($file, json_encode($arrCompromissos)) ? "Cadastrado com sucesso" : "Erro ao cadastrar";
    
    
    
    }
?>

<div class="container">
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

    <?php
        include_once "footer.php";
    ?>