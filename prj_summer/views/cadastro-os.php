<?php
include_once "../config/deny.php";
?>

<!-- animação de load -->

<div id="load-os" class="col-sm-offset-5"></div>

 <div id="msgerro-os"  style="display: none;" class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        CPF não cadastrado! Cadastre o cliente antes de prosseguir!
    </div>
    
<div class="container-fluid">
    <form id="cadastro-os" class="form-horizontal" method="POST" action="" autocomplete="off" >

        <?php include_once 'dados-1-os.php'; ?>
        <?php include_once 'dados-2-os.php'; ?>


        <div class="modal-footer form-group">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="limpar" name="limpar" class="btn btn-danger" type="reset">Limpar formul&aacuterio</button>
            <button id="submit-user" type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
