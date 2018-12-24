<?php
session_start();
//faz o login do usuario de acordo com os dados passados
include_once '../config/database.php';
include_once '../models/usuario.php';


$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$usuario->login = strip_tags($_POST['login']);
$usuario->senha = md5(strip_tags($_POST['senha']));

//valida o login
$stmt = $usuario->logando();


$row = $stmt->fetch(PDO::FETCH_ASSOC);

$num = $stmt->rowCount();
$statusAtividade = $row["statusAtividade"];


if($num > 0){ 
    if($statusAtividade == 1){
        echo 1;
        $_SESSION['idUsuarios'] = $row["idUsuarios"];
        $_SESSION['login'] = $row["login"];
        $_SESSION['senha'] = $row["senha"];
        $_SESSION['perfil'] = $row["perfil"];

    }else{
        echo 2;      
    }
}else{
    echo 3;
}

?>