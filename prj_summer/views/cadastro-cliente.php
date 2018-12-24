<?php
session_start();

//evitar o acesso do perfil 1 ao cadastro de acordo com o caso de uso
if (($_SESSION["perfil"] != 3) && ($_SESSION["perfil"] != 2)) {
    header('location:../index.php');
}


include_once "../views/header.php";
include_once "../views/menu.php";
?>

<div class="flex container">
    <div  class="panel-right">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#cadastro-cliente">Cadastro</a></li>
            <li><a data-toggle="tab" href="#tabClientes">Clientes</a></li>
        </ul>      

        <!-- Mensagem Sucesso -->
        <div id="msgsucessoclient"  style="display: none;" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Cliente cadastrado com sucesso!
        </div>

        <!-- Tab Order com tela de cadastro e listagem de usuario cadastrados--> 
        <div class="tab-content">
            <div id="cadastro-cliente" class="tab-pane fade in active">

                <div id="load" class="col-sm-offset-5"></div>

                <!-- Inicio do formulário -->
                <form id="cadastro-cliente-form" class="form-horizontal" method="POST" action="" autocomplete="off">

                    <fieldset>
                        <div class="form-group"><legend> Dados Pessoais </legend></div>

                        <!-- Formulário dados Cliente -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="nome">Nome:</label>  
                            <div class="col-md-8">
                                <input id="nome" name="nome" type="text" placeholder="Digite o Nome Completo" class="form-control input-md" required="true" maxlength="45">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="email">E-mail:</label>  
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Digite o E-mail" class="form-control input-md" maxlength="45">

                            </div>
                        </div>                   

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="rg">RG:</label>  
                            <div class="col-md-3">
                                <input id="rg" name="rg" type="text" placeholder="Digite o RG" class="form-control input-md" maxlength="45">
                            </div>

                            <label class="col-md-2 control-label" for="cpf">CPF:</label>  
                            <div class="col-md-3">
                                <input  id="cpf-cnpj-cliente" name="cpf" type="text" placeholder="Digite o CPF" class="form-control input-md" required="true" maxlength="45">

                            </div>                    
                        </div>                  

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="telFixo">Telefone:</label>  
                            <div class="col-md-3">
                                <input id="telFixo" name="telFixo" type="text" placeholder="Digite o Telefone" class="form-control input-md" maxlength="40">

                            </div>

                            <label class="col-md-2 control-label" for="telCleluar">Celular:</label>  
                            <div class="col-md-3">
                                <input id="telCelular" name="telCelular" type="text" placeholder="Digite o Celular" class="form-control input-md" maxlength="40">

                            </div>
                        </div>   

                    </fieldset>
                    <hr/>

                    <!-- Formulário do Endereço -->
                    <fieldset>
                        <div class="form-group"><legend> Endereço </legend></div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="largadouro">Logradouro:</label>  
                            <div class="col-md-8">
                                <input id="largadouro" name="logradouro" type="text" placeholder="Digite o Logradouro"  class="form-control input-md" required="true" maxlength="50">

                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="numero">Número:</label>  
                            <div class="col-md-3">
                                <input id="numero" name="numero" type="text" placeholder="Digite o Número"  class="form-control input-md" required="true" maxlength="15">

                            </div>

                            <label class="col-md-2 control-label" for="bairro">Bairro:</label>  
                            <div class="col-md-3">
                                <input id="bairro" name="bairro" type="text" placeholder="Digite o Bairro"  class="form-control input-md" required="true" maxlength="50">

                            </div>

                        </div>                 

                        <div class="form-group">

                            <label class="col-md-2 control-label" for="cep">CEP:</label>  
                            <div class="col-md-2">
                                <input id="cep" name="cep" type="text" placeholder="Digite o CEP"  class="form-control input-md" required="true" maxlength="30">

                            </div>

                            <label class="col-md-1 control-label" for="cidade">Cidade:</label>  
                            <div class="col-md-2">
                                <input id="cidade" name="cidade" type="text" placeholder="Digite a Cidade"  class="form-control input-md" required="true" maxlength="50">

                            </div>

                            <label class="col-md-1 control-label" for="uf">UF:</label>
                            <div class="col-md-2">
                                <select id="uf" name="uf" class="form-control">
                                    <option value="DF">DF</option>
                                    <option value="GO">GO</option>                            
                                </select>
                            </div>

                        </div>                

                    </fieldset>
                    <hr/>
                    <div class="modal-footer form-group">
                        <button id="limpar" name="limpar" class="btn btn-danger" type="reset">Limpar formul&aacuterio</button>
                        <button id="submit-cliente" type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>

<?php
include_once '../config/database.php';
include_once '../models/cliente.php';
$database = new Database();
$db = $database->getConnection();

$cliente = new Cliente($db);

$stmt = $cliente->readAll();

$num = $stmt->rowCount();
echo '<div id="tabClientes" class="tab-pane fade">';
if ($num > 0) {


    echo '<h3>Clientes Cadastrados</h3>
          
        <div id="msgsucesso-cliente-update"  style="display: none;" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Cliente Alterado com sucesso!
        </div>
        
        <table id="cadastro-cliente-table" class="os-cliente-table table display table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class=".select-filter span2">Nome</th>
                    <th class=".select-filter span2">CPF</th>
                    <th class=".select-filter span2">Celular</th>
                    <th class=".select-filter span2">Ação</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


        extract($row);

        echo "<tr>";
        echo "<td>{$nome}</td>";
        echo "<td>{$cpf}</td>";
        echo "<td>{$telCelular}</td>";
        echo "<td>";

        echo "<div id='cpf' class='cpf display-none' style='display: none;'>{$cpf}</div>";
        echo "<div class='btn btn-info edit-btn edit-cliente margin-right-2em'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Editar";
        echo "</div>";







        echo "</td>";

        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div class='lista_clientes alert alert-info'>Nenhum Cliente Cadastrado!</div>";
}

echo "<div id='page-edita-cliente'></div>";

echo "</div>";
?>
        </div>
    </div>
</div>
</div>




<?php
include_once "footer.php";
?>