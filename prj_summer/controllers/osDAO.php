<?php
session_start();

include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

include_once '../models/os.php';


include_once '../models/controleos.php';
$controleos = new ControleOs($db);

include_once '../models/cliente.php';
$cliente = new Cliente($db);

$cliente->cpf = $_POST["clientes_cpf"];

//verificar se existe o cpf no banco!
$validaCpf = $cliente->validaCpf();


if($validaCpf){
    
    $os = new Os($db);
    
    
    $dataEmissao = date("Y-m-d  H:i:s", strtotime(str_replace('/', '-', $_POST["dataEmissao"])));
    $os->dataEmissao = $dataEmissao;

    $dataPrevEntrega = date("Y-m-d  H:i:s", strtotime(str_replace('/', '-', $_POST["dataPrevEntrega"])));
    $os->dataPrevEntrega = $dataPrevEntrega;

    //Status pagamento onde 0 - Pago ; 1 - Pendente ; 2 - Cobranca
    $os->statusPg = 1;

    //Grau Olho Direito Longe
    // Não deixar ir em branco para o banco, pois, da erro!!! Por isso o if ternário ############
    $os->longEsfOd = empty(strip_tags($_POST["longEsfOd"])) ? 0.00 : strip_tags($_POST["longEsfOd"]);
    $os->longCilOd = empty(strip_tags($_POST["longCilOd"])) ? 0.00 : strip_tags($_POST["longCilOd"]);
    $os->longEixoOd = empty(strip_tags($_POST["longEixoOd"])) ? 0.00 : strip_tags($_POST["longEixoOd"]);
    $os->longDnpOd = empty(strip_tags($_POST["longDnpOd"])) ? 0.00 : strip_tags($_POST["longDnpOd"]);
    $os->longAlturaOd = empty(strip_tags($_POST["longAlturaOd"])) ? 0.00 : strip_tags($_POST["longAlturaOd"]);

    //Grau Olho Esquerdo Longe
    $os->longEsfOe = empty(strip_tags($_POST["longEsfOe"])) ? 0.00 : strip_tags($_POST["longEsfOe"]);
    $os->longCilOe = empty(strip_tags($_POST["longCilOe"])) ? 0.00 : strip_tags($_POST["longCilOe"]);
    $os->longEixoOe = empty(strip_tags($_POST["longEixoOe"])) ? 0.00 : strip_tags($_POST["longEixoOe"]);
    $os->longDnpOe = empty(strip_tags($_POST["longDnpOe"])) ? 0.00 : strip_tags($_POST["longDnpOe"]);
    $os->longAlturaOe = empty(strip_tags($_POST["longAlturaOe"])) ? 0.00 : strip_tags($_POST["longAlturaOe"]);

    //Grau Olho Direito Perto
    $os->perEsfOd = empty(strip_tags($_POST["perEsfOd"])) ? 0.00 : strip_tags($_POST["perEsfOd"]);
    $os->perCilOd = empty(strip_tags($_POST["perCilOd"])) ? 0.00 : strip_tags($_POST["perCilOd"]);
    $os->perEixoOd = empty(strip_tags($_POST["perEixoOd"])) ? 0.00 : strip_tags($_POST["perEixoOd"]);
    $os->perDnpOd = empty(strip_tags($_POST["perDnpOd"])) ? 0.00 : strip_tags($_POST["perDnpOd"]);
    $os->perAlturaOd = empty(strip_tags($_POST["perAlturaOd"])) ? 0.00 : strip_tags($_POST["perAlturaOd"]);

    //Grau Olho Esquerdo Perto
    $os->perEsfOe = empty(strip_tags($_POST["perEsfOe"])) ? 0.00 : strip_tags($_POST["perEsfOe"]);
    $os->perCilOe = empty(strip_tags($_POST["perCilOe"])) ? 0.00 : strip_tags($_POST["perCilOe"]);
    $os->perEixoOe = empty(strip_tags($_POST["perEixoOe"])) ? 0.00 : strip_tags($_POST["perEixoOe"]);
    $os->perDnpOe = empty(strip_tags($_POST["perDnpOe"])) ? 0.00 : strip_tags($_POST["perDnpOe"]);
    $os->perAlturaOe = empty(strip_tags($_POST["perAlturaOe"])) ? 0.00 : strip_tags($_POST["perAlturaOe"]);

    //Dados Adicionais da Ordem de servi�o
    $os->adicao = empty(strip_tags($_POST["adicao"])) ? 0.00 : strip_tags($_POST["adicao"]);

    $os->armacao = strip_tags($_POST["armacao"]);

    $dataVencLentes = date("Y-m-d", strtotime(str_replace('/', '-', $_POST["dataVencLentes"])));
    $os->dataVencLentes = $dataVencLentes;

    $os->lentes = strip_tags($_POST["lentes"]);
    $os->medico = strip_tags($_POST["medico"]);
    $os->receita = strip_tags($_POST["receita"]);

    //Pagamento
    $os->formaPg = strip_tags($_POST["pagamento"]);

    $dataPg = date("Y-m-d  H:i:s", strtotime(str_replace('/', '-', $_POST["dataPg"])));
    $os->dataPg = $dataPg;

    $os->nParcelas = strip_tags($_POST["nParcelas"]);
    $os->observacao = strip_tags($_POST["observacao"]);

    preg_match("/\d.*/im", $_POST["valor"], $output_array);
    $valorPt = preg_replace("/\./im", "", $output_array[0]);
    $valorPg = preg_replace("/,/im", ".", $valorPt);


    $os->valor = empty(strip_tags($valorPg)) ? 0.00 : strip_tags($valorPg);
    $os->clientes_cpf = strip_tags($_POST["clientes_cpf"]);

    $id = $os->create();

    if($id > 0){

        $id_idos = $id;

        $controleos->os_idos = $id;

        // 0 = pendente , 1 = em andamento e 2 = finalizada
        $controleos->statusAndamentoOs = 0;

        // data de criacao da os
        $controleos->dataStatusAndamentoOs = $dataEmissao;

        $controleos->usuarios_idUsuarios = $_SESSION["idUsuarios"];

        $controleos->create();
    }else{
        echo -1;
    }
}else{
    echo 3;
}

?>