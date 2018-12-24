<?php
include_once '../config/deny.php';
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

include_once '../models/controleos.php';
$controleos = new ControleOs($db);


$stmtOs = $controleos->readAll();


$numeroOs = $stmtOs->rowCount();



if ($numeroOs > 0) {


    echo '
          
        
        <table class="os-table-todas table display table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class=".select-filter span2">Id Os</th>
                    <th class=".select-filter span2">Nome Cliente</th>
                    <th class=".select-filter span2">Celular</th>
                    <th class=".select-filter span2">Data Alteração Status</th>
                    <th class=".select-filter span2"></th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $stmtOs->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        echo "<tr>";
        echo "<td>{$os_idos}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$telCelular}</td>";
        
        //parse pra exibicao da data
        $newDate = date("d/m/Y H:i", strtotime($dataStatusAndamentoOs));
        echo "<td class='dateField'>{$newDate}</td>";


        echo "<td>";
        echo "<div id='idOsList' class='idOsList display-none' style='display: none;'>{$os_idos}</div>";

        echo "<div class='btn btn-warning edit-btn margin-right-2em'>";
        echo "<a id='edit-os-status' data-toggle='modal' data-target='#myModalEdit' href='#myModalEdit'> <span class='glyphicon glyphicon-edit'></span>Alterar Status</a>";
        echo "</div>";
        echo "<div class='btn btn-info edit-btn margin-right-2em col-md-offset-1'>";
        echo "<a id='os-info-link' data-toggle='modal' data-target='.bs-os-info-modal-lg' href='' title='Clique para ver as informações da OS'> <span class='glyphicon glyphicon-th-list'></span>Os Info</a>";
        echo "</div>";

        echo "</td>";

        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div class='lista_todas alert alert-info'>Nenhuma Ordem de serviço!</div>";
}
?>

