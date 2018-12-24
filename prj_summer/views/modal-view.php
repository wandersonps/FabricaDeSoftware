<?php
include_once "../config/deny.php";
?>

<!-- Modal Cadastro de OS - Incluir formujlário de cadastro da OS -->
<div class="modal fade  bs-os-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button id="close-os-modal" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Ordem de Serviço</h4>
            </div>
            <div class="modal-body">
<?php include_once 'cadastro-os.php' ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edição Status da OS (Finalizada, em andamento...) - E também de informações da mesma -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button id="close-os-status-modal" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Status Ordem de Serviço</h4>
            </div>
            <div id="load-os-status" class="col-sm-offset-5"></div>
            <div id="page-edita-status-os" class="modal-body">


            </div>

        </div>
    </div>
</div>


<!-- Modal Informações da OS -->

<div id="modal-os-info" class="modal fade  bs-os-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Informações Ordem de Serviço</h4>
            </div>
            <div id="os-info-body" class="modal-body">

            </div>

        </div>
    </div>
</div>


<!-- Modal Usuário - cadastro e lista -->

<div id="modal-user" class="modal fade  bs-user-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastro de Usuarios</h4>
            </div>
            <div class="modal-body">
<?php include_once 'cadastro-usuario.php' ?>
            </div>

        </div>
    </div>
</div>

