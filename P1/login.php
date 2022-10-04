<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIOGO P1 – Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="container" style="max-width: 400px;">
            <form class="form-signin" id="logar" name="logar" method="POST" action="login.php" style="flex-grow:1;flex-shrink:1;">
                <!-- IMAGEM DE ENTRADA  -->
                <img name="gif" id="gif" src="assets/img/login.png" class="img-responsive" alt="">
                <hr>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input type="text" id="tx_login" name="tx_login" class="form-control" placeholder="Usuário" onkeyup="upper(this);" required="" autofocus="">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <input id="tx_senha" type="password" class="form-control" name="tx_senha" placeholder="Senha" required="">
                    <div id="div-eye" onclick="show()" class="input-group-append">
                        <span class="input-group-text"><i id="eye" class="fas fa-eye"></i></span>
                    </div>
                </div>
                <input type="submit" id="bt_entrar" name="bt_entrar" value="Acessar" class="btn btn-lg btn-primary btn-block">
                <br>
            </form>
        </div>
    </main>
</body>
<script src="https://kit.fontawesome.com/c5b43aab05.js" crossorigin="anonymous"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
    $('#div-eye').on('click', () => {
        let input = document.getElementById('tx_senha');
        let olho = document.getElementById('eye');
        if (input.type === 'text') {
            input.type = 'password';
            olho.className = "fas fa-eye";
        } else {
            input.type = 'text';
            olho.className = "fas fa-eye-slash";
        }
    })

    // function show() {
    //     let input = document.getElementById('tx_senha');
    //     let olho = document.getElementById('eye');
    //     if (input.type === 'text') {
    //         input.type = 'password';
    //         olho.className = "fas fa-eye";
    //     } else {
    //         input.type = 'text';
    //         olho.className = "fas fa-eye-slash";
    //     }
    // }
</script>
</html>