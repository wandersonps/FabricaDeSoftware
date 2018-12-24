<?php
include_once "../config/deny.php";
//evitar o acesso do perfil 1 ao cadastro de acordo com o caso de uso
if (($_SESSION["perfil"] != 3) && ($_SESSION["perfil"] != 2)) {
    header('location:../index.php');
}
?>
 <div id="msgerro-same-login"  style="display: none;" class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Login já existe! Informe outro login para prosseguir.
    </div>
    
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#cadastro">Cadastro</a></li>
    <li><a data-toggle="tab" href="#tabUsuario">Usuarios</a></li>
</ul>
<!-- Tab Order com tela de cadastro e listagem de usuario cadastrados--> 
<div class="tab-content">
    <div id="cadastro" class="tab-pane fade in active">
        <h3>Cadastro</h3>

        <!-- Mensagem Sucesso -->
        <div id="msgsucessouser"  style="display: none;" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Usuário cadastrado com sucesso!
        </div>



        <!-- animação de load -->
        <div id="load" class="col-sm-offset-5"></div>
        <!-- Inicio do formul�rio -->
        <form id="cadastro-usuario" class="form-horizontal" method="POST" action="" autocomplete="off">

            <fieldset>
                <div class="form-group"><legend> Dados Pessoais </legend></div>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="nome">Nome:</label>  
                    <div class="col-md-7">
                        <input id="nome" name="nome" type="text" placeholder="Digite o Nome Completo" class="form-control input-md" required="true" maxlength="45">

                    </div>
                </div>  


            </fieldset>
            <hr/>
            <fieldset>
                <div class="form-group"><legend> Informações de Login </legend></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="login">Login:</label>  
                    <div class="col-md-7">
                        <input id="usuario" name="login" type="text" placeholder="Digite o Login"  class="form-control input-md" required="true" maxlength="50" autocomplete="off">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="senha">Senha:</label>
                    <div class="col-md-7">
                        <input id="senha" name="senha" type="password" placeholder="Digite a sua Senha" class="form-control input-md" required="true" maxlength="64" autocomplete="off">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="senha2"> Reiterar Senha:</label>
                    <div class="col-md-7">

                        <div id="msgerrosenha"  style="display: none;" class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Senhas não conferem!
                        </div>
                        <input id="senha2" name="senha2" type="password" placeholder="Reitere a Senha" class="form-control input-md" required="true" maxlength="64" autocomplete="off">

                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label" for="perfil">Perfil:</label>
                    <div class="col-md-7">
                        <select id="perfil" name="perfil" class="form-control">
                            <option value="1">Montador</option>
                            <option value="2">Atendente</option>
                            <option value="3">Gerente</option>
                        </select>
                    </div>
                </div>

            </fieldset>
            <hr/>
            <div class="modal-footer form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="limpar" name="limpar" class="btn btn-danger" type="reset">Limpar formulário</button>
                <button id="submit-user" type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>

    <?php
    include_once '../config/database.php';
    include_once '../models/usuario.php';
    $database = new Database();
    $db = $database->getConnection();

    $usuario = new Usuario($db);

    $stmt = $usuario->readAll();

    $num = $stmt->rowCount();
    echo '<div id="tabUsuario" class="tab-pane fade">';
    if ($num > 0) {


        echo '<h3>Usuários Cadastrados</h3>
          
        <div id="msgsucesso-user-update"  style="display: none;" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Usuário Alterado com sucesso!
        </div>
        
        <div id="msgsucesso-usuario-status"  style="display: none;" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Status alterado com sucesso!
        </div>
        
         <div id="msgerror-usuario-status"  style="display: none;" class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Você não pode se auto desabilitar!
        </div>
        
        <table id="cadastro-user-table" class="os-user-table table display table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class=".select-filter span2">Nome</th>
                    <th class=".select-filter span2">Login</th>
                    <th class=".select-filter span2">Perfil</th>
                    <th class=".select-filter span2">Ação</th>
                </tr>
            </thead>
            <tbody>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


            extract($row);

            echo "<tr>";
            echo "<td>{$nome}</td>";
            echo "<td>{$login}</td>";
            if ($perfil == "1") {
                echo "<td>Montador</td>";
            } else if ($perfil == 2) {
                echo "<td>Atendente</td>";
            } else if ($perfil == 3) {
                echo "<td>Gerente</td>";
            }
            echo "<td>";

            $hiddenDisable = '';
            $hiddenEnable = '';

            if ($statusAtividade != 1) {
                $hiddenDisable = 'hidden';
            } else {
                $hiddenEnable = 'hidden';
            }

            echo "<div  class='idUsuarios display-none' style='display: none;'>{$idUsuarios}</div>";


            echo "<div class='$hiddenDisable btn btn-info edit-btn edit-user margin-right-2em'>";
            echo "<span class='glyphicon glyphicon-edit'></span> Editar";
            echo "</div>";

            //implementar o desabilitar! 0 = desabilitado e 1 = habilitado (variavel statusAtividade)
            echo "<div class='$hiddenDisable desabilitar-usuario btn btn-warning warning-btn col-md-offset-1'>";
            echo "<span class='glyphicon glyphicon-delete'></span> Desabilitar";
            echo "</div>";

            //implementar o desabilitar! 0 = desabilitado e 1 = habilitado (variavel statusAtividade)
            echo "<div class='$hiddenEnable habilitar-usuario btn btn-success success-btn'>";
            echo "<span class='glyphicon glyphicon-plus'></span> Habilitar";
            echo "</div>";
            echo "</td>";



            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='lista_clientes alert alert-info'>Nenhum Usuário Cadastrado!</div>";
    }

    echo "<div id='page-edita'></div>";

    echo "</div>";
    ?>

</div>
