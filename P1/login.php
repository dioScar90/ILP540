<form class="form-signin" id="logar" method="POST" action="index.php" style="flex-grow:1;flex-shrink:1;width:300px;">
    <!-- IMAGEM DE ENTRADA  -->
    <img name="img_login" id="img_login" src="assets/img/login.png" class="img-responsive" alt="" style="width:300px;">
    <hr>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <!--style="text-transform:lowercase"-->
        <input type="text"  id="login" name="login" class="form-control" placeholder="Usuário" required autofocus>
    </div>
    <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            </div>
            <input id="senha" type="password" class="form-control" name="senha" placeholder="Senha" required>
            <div class="input-group-append">
                <span id="div-eye" class="input-group-text"><i id="eye" class="fas fa-eye"></i></span>
            </div>
        </div>
    <input type="submit" id="bt_entrar" value="Acessar" class="btn btn-lg btn-primary btn-block">
    <br>
</form>