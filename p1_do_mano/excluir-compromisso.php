<?php
session_start();

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}

$adm_login = $_SESSION["adm_login"];
$local = isset($_GET["local"]) ? $_GET["local"] : "";
$datahora = isset($_GET["datahora"]) ? $_GET["datahora"] : "";
$compromisso = isset($_GET["compromisso"]) ? $_GET["compromisso"] : "";

$arquivo = file_get_contents("compromissos.json");
$array = json_decode($arquivo);

for ($i = 0; $i < count($array); $i++) {
    $row = $array[$i];
    if (
        $row->local == $local &&
        $row->data_hora == $datahora &&
        $row->compromisso == $compromisso &&
        $row->adm_login == $adm_login
    ) {
        unset($array[$i]);
    }
}
$file = fopen("compromissos.json", "w");
fwrite($file, json_encode($array));


header("Location: home.php");
