<?php
//update do usuario requisitado via ajax
include_once '../config/database.php';
include_once '../models/usuario.php';

 
$database = new Database();
$db = $database->getConnection();
 
$usuario = new Usuario($db);


$usuario->idUsuarios= strip_tags($_POST['IdUsuarios']);

$usuario->nome=strip_tags($_POST['nome']);

$usuario->login=strip_tags($_POST['login']);

$usuario->senha=md5(strip_tags($_POST['senha']));

$usuario->perfil=strip_tags($_POST['perfil']);

$usuario->update();

?>