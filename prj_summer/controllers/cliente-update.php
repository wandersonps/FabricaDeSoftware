<?php
//update do cliente requisitado via ajax
include_once '../config/database.php';
include_once '../models/cliente.php';
include_once '../models/endereco.php';

 
$database = new Database();
$db = $database->getConnection();
 
$cliente = new Cliente($db);


$cliente->nome = strip_tags($_POST["nome"]);

$cliente->email = strip_tags($_POST["email"]);

$cliente->rg = strip_tags($_POST["rg"]);

$cliente->cpf = strip_tags($_POST["cpf"]);

$cliente->telFixo = strip_tags($_POST["telFixo"]);

$cliente->telCelular = strip_tags($_POST["telCelular"]);

$cliente->endereco_id = strip_tags($_POST["endereco_id"]);


$cliente->update();


$endereco = new Endereco($db);

$endereco->id = strip_tags($_POST["endereco_id"]);

$endereco->logradouro = strip_tags($_POST["logradouro"]);

$endereco->numero = strip_tags($_POST["numero"]);

$endereco->bairro = strip_tags($_POST["bairro"]);

$endereco->uf = strip_tags($_POST["uf"]);

$endereco->cidade = strip_tags($_POST["cidade"]);

$endereco->cep= strip_tags($_POST["cep"]);

$endereco->update();

?>