<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["login"])) {
        header("Location: index.php");
    }
    
    include_once "header.php";
    include_once "menu.php";
?>

<div class="container">
    <?php
        $usuarioLogado = $_SESSION['login'] ?? '';
        $arquivo = is_file("compromissos.json") ? file_get_contents("compromissos.json") : "[]";
        $arrCompromissos = json_decode($arquivo);
    ?>

    <div class="row">
        <div class="col-md-6">
            <h2> Cadastro de compromissos. </h2>
        </div>
        <div class="col-md-6" style="text-align:right;">
            <a href="cadastrar.php" class="btn btn-primary">Cadastrar</a>
        </div>
    </div>
    
    <p> Olá, <?= ucfirst($usuarioLogado) ?>. Cadastre aqui seus compromissos. </p>

    <?php
        if (empty($arrCompromissos)) {
    ?>

    <div id='nao-tem'>
        <div class='text-center alert alert-warning' role='alert' style="border-color: #f09a29;">
            <h5 style='margin: 20px 0px;'>
                <kbd class='bg-warning-2' style="background-color: #f09a29;">Ainda não há nenhum compromisso cadastrado.</kbd>
            </h5>
        </div>
    </div>

    <?php
        }
        else {
    ?>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-head-color">
                <tr class="text-white">
                    <!-- <th scope="col">Cód.</th>
                    <th scope="col">Menu</th> -->
                    <th scope="col" class="text-center">Data / Hora</th>
                    <th scope="col" class="text-center">Descrição</th>
                    <th scope="col" class="text-center">Local</th>
                    <!-- <th scope="col">Excluir</th> -->
                    
                </tr>
            </thead>
            <tbody>
    <?php        
            foreach ($arrCompromissos as $key => $item) {
    ?>
                <tr>
                    <th scope="row">
                        <a href="cadastro?id=<?=$item->it_cod ?>" style="display: block; height: 100%; width: 100%;">
                            <?php echo $item->it_cod;?>
                        </a>
                    </th>
                    
                    <td>
                        <a href="cadastro?id=<?=$item->it_cod ?>" style="display: block; height: 100%; width: 100%;">
                            <?php echo $item->menu_cod; ?>
                        </a>
                    </td>
                    
                    <td>
                        <a href="cadastro?id=<?=$item->it_cod ?>" class="text-center" style="display: block; height: 100%; width: 100%;">
                            <?php echo $item->it_desc; ?>
                        </a>
                    </td>
                    
                    <td>
                        <a href="cadastro?id=<?=$item->it_cod ?>" class="text-center" style="display: block; height: 100%; width: 100%;">
                            <?php echo $item->it_caminho; ?>
                        </a>
                    </td>
                    <!--Aqui é o link para exclusão -->
                    <td class="text-center">
                        <a name="C<?=$item->it_cod ?>" href="?<?php echo (isset($_GET['pagina']))? "pagina=".$_GET['pagina'] : ""; echo  (isset($_GET['filtro']))? "&filtro=".$_GET['filtro'] : "";?>&ver=<?php echo $item->it_cod; ?>&status=<?php echo $item->it_status; ?>">
                            <b>
                                <span class="fas fa-eye<?php echo $item->it_status == 1?"":"-slash"; ?>"></span>            
                                <?php echo $item->it_status == 1?"Ativo":"Inativo"; ?>
                            </b>
                        </a>
                    </td>

                    <td> 
                        <a href="?<?php echo (isset($_GET['pagina']))? "pagina=".$_GET['pagina'] : ""; echo  (isset($_GET['filtro']))? "&filtro=".$_GET['filtro'] : "";?>&excluir=<?php echo $item->it_cod; ?>" onclick="return confirm('Deseja Excluir o Item de Menu?');">
                            <button type="submit" class="btn btn-danger" value="<?php echo $item->it_cod; ?>">
                                <span class="fas fa-trash-alt"></span> Excluir
                            </button>                                  
                        </a>
                    </td>
                </tr>
    <?php
            }
    ?>
            </tbody>
        </table>
    </div>
    <?php
        }
    ?>
    
    
</div>

    <?php
        include_once "footer.php";
    ?>