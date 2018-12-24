<?php
//inicia a sessão e verifica se o usuario está autenticado

if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['perfil']);
    unset($_SESSION['senha']);
    header('location:../index.php');
}
$logado = $_SESSION['login'];
$perfil = $_SESSION['perfil'];
?>

<nav role="navigation" class="menu">
    <div class="wrapper container">
        <nav role="menu" class="menu__links">
            <a class="" href="../">Gerenciamento de OS</a>
            <?php
            if (($perfil == 3 || $perfil == 2)) {
                echo '<a class = " " href = "../views/cadastro-cliente.php">Gerenciamento de Clientes</a>';
            }
            ?>

            <ul class="menu-funcoes pull-right">
                <li class="dropdown" style="list-style: none;">
                    <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="">
                        Bem Vindo, <?php echo $logado ?>
                        <i class="icon-user icon-white"></i>
                        <span class=" glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul aria-labelledby="drop3" role="menu" class="dropdown-menu pull-right">
                        <?php
                        if ($perfil == 3) {

                            echo '<li role="presentation"><a tabindex="-1" data-toggle="modal" data-target=".bs-user-modal-lg" href=""> <i aria-hidden="true" class="glyphicon glyphicon-plus-sign"></i> Gerenciamento de usuários  </a></li>';
                        }
                        ?>

                        <li role="presentation"><a tabindex="-1" href="../controllers/logout.php"> <i aria-hidden="true" class="glyphicon glyphicon-log-out"></i> Sair  </a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>
</nav>


<?php
include_once "modal-view.php";
?>