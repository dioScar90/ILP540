<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["login"])) {
        header("Location: index.php");
    }

    include_once "header.php";
    include_once "menu.php";

    // $usuarioLogado = $_SESSION["login"];
    // $local = $_GET["local"] ?? "";
    // $datahora = $_GET["datahora"] ?? "";
    // $compromisso = $_GET["compromisso"] ?? "";
    $idParaRemover = $_GET["id"] ?? 0;

    $arquivo = is_file("compromissos.json") ? file_get_contents("compromissos.json") : "[]";
    $arrCompromissos = json_decode($arquivo);

    for ($i = 0; $i < sizeof($arrCompromissos); $i++) {
        $linha = $arrCompromissos[$i];
        if ($idParaRemover == $linha->id) {
            unset($arrCompromissos[$i]);
        }
    }
    $file = fopen("compromissos.json", "w");
    fwrite($file, json_encode($arrCompromissos));


    header("Location: home.php");
?>
    
    
</div>

    <?php
        include_once "footer.php";
    ?>