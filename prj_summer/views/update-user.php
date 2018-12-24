<?php
include_once '../config/deny.php';
include_once '../config/database.php';
include_once '../models/usuario.php';


$idUsuarios = isset($_GET['id']) ? $_GET['id'] : die("Erro ao encontrar Usuário!");

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$usuario->idUsuarios = $idUsuarios;

$usuario->readOne();

?>

<form id='update-user' action='' method='post' border='0' autocomplete="off">
     <!-- Mensagem Sucesso -->
     
    <table class='table table-bordered table-hover'>

        <tr>
            <td>Nome</td>
            <td>
                <input name='nome' type="text" class='form-control nome-editar' value='<?php echo htmlspecialchars($usuario->nome, ENT_QUOTES); ?>' required=/>
            </td>
        </tr>
        <tr>
            <td>Login</td>
            <td><input type='text' name='login' class='form-control' value='<?php echo htmlspecialchars($usuario->login, ENT_QUOTES); ?>' required  disabled="true"/></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input  id="senha-edit" type='password' name='senha' class='form-control' value='' required /></td>
        </tr>
        <tr>
        <div id="msgerro-update-senha"  style="display: none;" class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Senhas não conferem!
        </div>
        <td>Reiterar Senha</td>
        <td><input id="senha-edit-2" type='password' name='senha' class='form-control' value='' required /></td>
        </tr>
        <tr>

            <td>Perfil</td>
            <td>
                <?php $selected = htmlspecialchars($usuario->perfil, ENT_QUOTES); ?>
                <select id="perfil" name="perfil" class="form-control">
                    <option value="1" <?= ($selected == '1') ? 'selected' : '' ?>>Montador</option>
                    <option value="2" <?= ($selected == '2') ? 'selected' : '' ?>>Atendente</option>
                    <option value="3" <?= ($selected == '3') ? 'selected' : '' ?>>Gerente</option>
                </select>
            </td>
        <tr>
            <td>

                <input type='hidden' name='IdUsuarios' value='<?php echo $idUsuarios ?>' /> 

            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Salvar Alterações
                </button>
            </td>
        </tr>
    </table>
</form>

<div id="msgsucessoupdate"  style="display: none;" class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Usuario alterado com sucesso!
</div>
