<<<<<<< HEAD
<?php include_once "header.php" ?>


<div class="container">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php include_once "footer.php" ?>
=======
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
>>>>>>> d90ab7c62170cec67ef7d20316075d3b49b0ce8a
