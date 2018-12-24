<?php

include_once '../config/database.php';
include_once '../models/usuario.php';

 
$database = new Database();
$db = $database->getConnection();
 
$usuario = new Usuario($db);

$usuario->idUsuarios= $_POST['idUsuarios'];
$usuario->statusAtividade= 1;

$usuario->changeStatus();

?>