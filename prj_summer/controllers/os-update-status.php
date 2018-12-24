<?php

session_start();
//update do usuario requisitado via ajax
include_once '../config/database.php';
include_once '../models/controleos.php';

date_default_timezone_set('America/Sao_Paulo');
 
$database = new Database();
$db = $database->getConnection();
 
$controleos = new ControleOs($db);

// data de alteracao
$dt = new DateTime();

$controleos->statusAndamentoOs = $_POST['statusAndamentoOs'];
$controleos->dataStatusAndamentoOs = $dt->format('Y-m-d H:i:s');
$controleos->id = $_POST['id'];
$controleos->usuarios_idUsuarios = $_SESSION['idUsuarios'];

$controleos->update();

?>