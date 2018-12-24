<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

    if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
        unset($_SESSION['login']);
        unset($_SESSION['perfil']);
        unset($_SESSION['senha']);
        header('location:../index.php');
        exit;
    }
}
?>