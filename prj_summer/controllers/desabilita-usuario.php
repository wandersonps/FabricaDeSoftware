<?php

session_start();

include_once '../config/database.php';
include_once '../models/usuario.php';


$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

if ($_SESSION['idUsuarios'] == $_POST['idUsuarios']) {
    echo 0;
} else {
    echo 1;
    $usuario->idUsuarios = $_POST['idUsuarios'];
    $usuario->statusAtividade = 0;
    $usuario->changeStatus();
}



?>