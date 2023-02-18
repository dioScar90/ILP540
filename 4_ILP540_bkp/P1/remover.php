<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["login"])) {
        header("Location: index.php");
    }

    include_once "header.php";
    include_once "menu.php";
    
    $idParaRemover = $_GET["id"] ?? 0;

    $arquivo = is_file("compromissos.json") ? file_get_contents("compromissos.json") : "[]";
    $arrCompromissos = !empty($arquivo) ? json_decode($arquivo) : array();
    
    if (count($arrCompromissos) > 0) {
        for ($i = 0; $i < count($arrCompromissos); $i++) {
            if ($idParaRemover == $arrCompromissos[$i]->id) {
                unset($arrCompromissos[$i]);
            }
        }
    }

    // Reorganiza os index pois estava dando erro no json_encode.
    $arrCompromissos = array_values($arrCompromissos);
    
    $file = fopen("compromissos.json", "w");
    $arrEncode = json_encode($arrCompromissos, false);
    fwrite($file, $arrEncode);
    
    header("Location: home.php");
    
    include_once "footer.php";
?>