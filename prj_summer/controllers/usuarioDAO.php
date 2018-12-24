<?php

include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

include_once '../models/usuario.php';
$usuario = new Usuario($db);

$usuario->login = strip_tags($_POST["login"]);

if ($usuario->verificaLogin()) {
    
    $usuario->nome = strip_tags($_POST["nome"]);
    $usuario->senha = md5(strip_tags($_POST["senha"]));
    $usuario->perfil = strip_tags($_POST["perfil"]);
    $usuario->statusAtividade = 1;

    $usuario->create();
    
} else {
    echo -1;
}
?>