<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "header.php";
    include_once "menu.php";
?>

<div class="container" style="min-height: 100%; display: flex; flex-direction: column">
    <?php
        if (isset($_POST["login"], $_POST["senha"])) {
            $login = $_POST["login"];
            $senha = $_POST["senha"];
        
            $csv = array_map('str_getcsv', file('users.csv'));
            foreach ($csv as $row) {
                if ($login == $row[0]) {
                    if ($senha == $row[1]) {
                        $_SESSION["login"] = $login;
                        header("Location: home.php");
                    } 
                }
            }
        }
        if (!isset($_SESSION['login'])) {
            // if (isset($_POST['acao'])) {
                $login = 'diogo';
                $senha = '123456';

                $loginForm = $_POST['login'] ?? '';
                $senhaForm = $_POST['senha'] ?? '';

                $csv = array_map('str_getcsv', file('users.csv'));
                foreach ($csv as $item) {
                    if ($loginForm == $item[0] && $senhaForm == $item[1]) {
                        // if ($senhaForm == $item[1]) {
                            // Logado com sucesso!
                            $_SESSION["login"] = $loginForm;
                            header("Location: home.php");
                        // } 
                    }
                    else {
                        // Algum erro ocorreu.
                        echo 'Dados inválidos';
                    }
                }
                // if ($login == $loginForm && $senha == $senhaForm) {
                //     // Logado com sucesso!
                //     $_SESSION['login'] = $login;
                //     header('Location: home.php');
                // }
                
            // }
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