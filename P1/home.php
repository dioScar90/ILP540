<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "header.php";
    include_once "menu.php";
?>

<div class="container">
    <h2> Bem-vindo, <?= ucfirst($_SESSION['login']) ?>. </h2>
    <p> Das ist meine erste Page. </p>
    <a href="?logout"> Fazer logout! </a>
</div>

<?php
    include_once "footer.php";
?>