<?php
session_start();

if((isset ($_SESSION['login']) == true) and (isset ($_SESSION['senha']) == true)){ 
    header('location: /prj_summer/views/home.php'); 
} else {
    header('location: /prj_summer/index.php'); 
}

