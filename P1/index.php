<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    include_once "header.php";
    include_once "menu.php";
?>

<div class="container" style="min-height: 100%; display: flex; flex-direction: column">
    <?php
        if (!isset($_SESSION["login"])) {
            include("login.php");
            
            if (isset($_POST["login"], $_POST["senha"])) {
                echo 'Dados inválidos';

                $loginForm = $_POST["login"];
                $senhaForm = $_POST["senha"];

                $csv = array_map("str_getcsv", file("users.csv"));
                if ($loginForm == $csv[0][0] && $senhaForm == $csv[0][1]) {
                    // Logado com sucesso!
                    $_SESSION["login"] = $loginForm;
                    header("Location: home.php");
                }
            }
        }
        else {
            if (isset($_GET["logout"])) {
                unset($_SESSION["login"]);
                session_destroy();
                header("Location: index.php");
            }
            
            header("Location: home.php");
        }
    ?>
</div>

<?php
    include_once "footer.php";
?>