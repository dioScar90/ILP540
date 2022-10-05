<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "header.php";
    include_once "menu.php";
?>

<div class="container">
    <?php
        if (!isset($_SESSION['login'])) {
            if (isset($_POST['acao'])) {
                $login = 'diogo';
                $senha = '123456';

                $loginForm = $_POST['login'];
                $senhaForm = $_POST['senha'];

                if ($login == $loginForm && $senha == $senhaForm) {
                    // Logado com sucesso!
                    $_SESSION['login'] = $login;
                    header('Location: index.php');
                }
                else {
                    // Algum erro ocorreu.
                    echo 'Dados inválidos';
                }
            }
            include('login.php');
        }
        else {
            if (isset($_GET['logout'])) {
                unset($_SESSION['login']);
                session_destroy();
                header('Location: index.php');
            }
            include('home.php');
        }
    ?>
</div>

<?php
    include_once "footer.php";
?>