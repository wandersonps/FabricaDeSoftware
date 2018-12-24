<?php
session_start();

include_once "../config/database.php";
include_once "header.php";
include_once "menu.php";

//inicia a sessão e verifica se o usuario está autenticado

if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['perfil']);
    unset($_SESSION['senha']);
    header('location:../index.php');
    exit;
}
$logado = $_SESSION['login'];
?>


<div class="flex container">
    <!-- Mensagem Sucesso -->


    <div class="flex2 slidebar-left">


        <ul class="nav nav-pills nav-stacked" id="myTabs">
            <li class="active"><a href="#pendentes" data-toggle="pill">Pendentes</a></li>
            <li><a href="#andamento" data-toggle="pill">Em andamento</a></li>
            <li><a href="#finalizadas" data-toggle="pill">Finalizadas</a></li>
            <li><a href="#canceladas" data-toggle="pill">Canceladas</a></li>
            <li><a href="#todas" data-toggle="pill">Todas</a></li>
        </ul>
    </div>


    <div class="panel-right">
        <div class="box-field-container" id="request-list-container">
            <div class="tab-content">
                <div id="msgsucesso-os"  style="display: none;" class="container alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Ordem de servico cadastrada com sucesso!
                </div>
                <!-- Mensagem Sucesso -->
                <div id="msgsucesso-os-update"  style="display: none;" class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Status alterado com sucesso!
                </div>
                <legend class="navigation-search">
                    <div class="span6">
                        <h2 class="page-title"> Lista de Ordens de Serviço </h2>
                    </div>


                </legend>

                <div class="span3">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-os-modal-lg" href="" ><span class="glyphicon glyphicon-plus"></span> Adicionar OS </button>

                    </div>
                </div>



                <div class="tab-pane active" id="pendentes">   
                    <?php
                    include_once "./os-table-filter-pendente.php";
                    ?>
                </div>
                <div class="tab-pane" id="andamento">
                    <?php
                    include_once "./os-table-filter-andamento.php";
                    ?>
                </div>
                <div class="tab-pane" id="finalizadas">
                    <?php
                    include_once "./os-table-filter-finalizadas.php";
                    ?>
                </div>
                 <div class="tab-pane" id="canceladas">
                    <?php
                    include_once "./os-table-filter-canceladas.php";
                    ?>
                </div>
                <div class="tab-pane" id="todas">
                    <?php
                    include_once "./os-table-filter-todas.php";
                    ?>
                </div>
            </div>


        </div>
    </div>

    <?php
    include_once "footer.php";
    ?>