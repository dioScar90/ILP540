<?php
    if (!isset($_SESSION)) {
        session_start();
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
                            <th scope="col" class="text-center">Data / Hora</th>
                            <th scope="col" class="text-center">Descrição</th>
                            <th scope="col" class="text-center">Local</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php        
            foreach ($arrCompromissos as $item) {
    ?>
                        <tr>
                            <th scope="row">
                                <?= date("d/m/Y H:m", strtotime($item->data_hora)); ?>
                            </th>
                            
                            <td>
                                <?= ucfirst($item->compromisso); ?>
                            </td>
                            
                            <td>
                                <?php
                                    echo $item->local;
                                ?>
                            </td>

                            <td> 
                                <a href="remover.php?compromisso=<?=$item->compromisso?>&local=<?=$item->local?>&datahora=<?=$item->data_hora?>" class="btn btn-danger">
                                    <button type="submit" class="btn btn-danger" value="<?php echo $item->it_cod; ?>">
                                        <span class="fas fa-trash-alt"></span> Remover
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