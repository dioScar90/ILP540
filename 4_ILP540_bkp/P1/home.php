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
        $arrCompromissos = !empty($arquivo) ? json_decode($arquivo) : array();

        // Ordena a tabela de acordo com data_hora.
        if (!is_null($arrCompromissos) && count($arrCompromissos) > 0) {
            usort($arrCompromissos, function($a, $b) {
                return $a->data_hora > $b->data_hora;
            });
        }
    ?>

    <div class="row">
        <div class="col-md-6">
            <h2> Cadastro de compromissos. </h2>
        </div>
        <div class="col-md-6" style="text-align:right;">
            <a href="cadastrar.php" class="btn btn-primary">Cadastrar</a>
        </div>
    </div>
    
    <p> Olá, <strong><?= ucfirst($usuarioLogado) ?></strong>. Cadastre aqui seus compromissos. </p>

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
                            <th scope="col" class="text-right">Descrição</th>
                            <th scope="col" class="text-right">Local</th>
                            <th scope="col" class="text-center">Remover</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php        
            foreach ($arrCompromissos as $item) {
    ?>
                        <tr>
                            <th scope="row" class="text-center">
                                <?= date("d/m/Y H:m", strtotime($item->data_hora)); ?>
                            </th>
                            
                            <td>
                                <?= ucfirst($item->compromisso); ?>
                            </td>
                            
                            <td>
                                <?= ucwords($item->local); ?>
                            </td>

                            <td class="text-center"> 
                                <a href="remover.php?id=<?= $item->id ?>">
                                    <button type="submit" class="btn btn-danger" value="<?= $item->id ?>">
                                        <span class="fas fa-trash-alt"></span>&nbsp;Remover
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