<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["login"])) {
        header("Location: index.php");
    }

    include_once "header.php";
    include_once "menu.php";

    if(isset($_POST["local"], $_POST["datahora"], $_POST["compromisso"])){
        $local = $_POST["local"];
        $datahora = $_POST["datahora"];
        $compromisso = $_POST["compromisso"];
        $usuarioLogado = $_SESSION["login"] ?? null;
    
        $arquivo = is_file("compromissos.json") ? file_get_contents("compromissos.json") : "[]";
        $arrCompromissos = !empty($arquivo) ? json_decode($arquivo) : array();
        $lastId = !empty($arrCompromissos) ? end($arrCompromissos)->id : 0;
    
        array_push($arrCompromissos, array(
            "id" => $lastId + 1,
            "user" => $usuarioLogado,
            "compromisso" => $compromisso,
            "local" => $local,
            "data_hora" => $datahora,
        ));
    
        $file = fopen("compromissos.json", "w");
        $msgAposCadastro = fwrite($file, json_encode($arrCompromissos)) ? "Cadastrado com sucesso" : "Erro ao cadastrar";
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

        <form method="POST">
            <input type="text" name="compromisso" id="compromisso" placeholder="Compromisso" class="form-control" required>
            <input type="text" name="local" id="local" placeholder="Local" class="form-control"required>
            <input type="datetime-local" name="datahora" id="datahora" placeholder="Data e Hora" class="form-control" required>
            <input type="submit" value="Cadastrar" class="btn btn-primary w100">

        </form>

        <?php
        
        if(isset($msgAposCadastro)) {
            echo $msgAposCadastro;
        }
        
        ?>


    </div>
    
    
</div>

    <?php
        include_once "footer.php";
    ?>