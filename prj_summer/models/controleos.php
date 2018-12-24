<?php

//classe ordem de servico
class ControleOs {

    private $conn;
    private $table_name = "os_usuarios";
    public $id;
    public $os_idos;
    public $statusAndamentoOs;
    public $dataStatusAndamentoOs;
    public $usuarios_idUsuarios;

    public function __construct($db) {
        $this->conn = $db;
    }

    //cria a os
    function create() {

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET                   
                    os_idos = ?, statusAndamentoOs = ?, dataStatusAndamentoOs = ?, usuarios_idUsuarios = ?";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(1, $this->os_idos);
        $stmt->bindParam(2, $this->statusAndamentoOs);
        $stmt->bindParam(3, $this->dataStatusAndamentoOs);
        $stmt->bindParam(4, $this->usuarios_idUsuarios);

        $rc = $stmt;

        if (false === $rc) {

            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
    }

    //lê as ordens de serviço de acordo com o status
    function readStatus($osStatus) {
        $query =  "SELECT * "
                . "FROM " . $this->table_name . "
                INNER JOIN os ON os_usuarios.os_idos = os.id
                INNER JOIN clientes ON os.clientes_cpf = clientes.cpf where os_usuarios.statusAndamentoOs = ".$osStatus." order by os_usuarios.dataStatusAndamentoOs";
        
        $stmt = $this->conn->prepare($query);
        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
        return $stmt;
    }

    //lê as ordens de serviço de acordo com o status
    function readAll() {
        $query = "SELECT * "
                . "FROM " . $this->table_name . "
                INNER JOIN os ON os_usuarios.os_idos = os.id
                INNER JOIN clientes ON os.clientes_cpf = clientes.cpf order by os_usuarios.dataStatusAndamentoOs";
        
        
        $stmt = $this->conn->prepare($query);
        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
        return $stmt;
    }
    
    //lê as ordens de serviço de acordo com o status
    function readOne() {
        
        $query = "SELECT * "
                . " FROM " . $this->table_name . 
                " WHERE os_idos = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->os_idos);
        
         $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
         
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
          	 	
        $this->id = $row['id'];  	 	
        $this->usuarios_idUsuarios = $row['usuarios_idUsuarios'];
        $this->statusAndamentoOs = $row['statusAndamentoOs'];
        $this->dataStatusAndamentoOs = $row['dataStatusAndamentoOs'];
        
    }
    
     //faz o update do status da OS
    function update() {
        $query = "UPDATE 
                os_usuarios
            SET 
                statusAndamentoOs = :statusAndamentoOs,
                usuarios_idUsuarios = :usuarios_idUsuarios,
                dataStatusAndamentoOs = :dataStatusAndamentoOs
            WHERE
                id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':statusAndamentoOs', $this->statusAndamentoOs);
        $stmt->bindParam(':usuarios_idUsuarios', $this->usuarios_idUsuarios);
        $stmt->bindParam(':dataStatusAndamentoOs', $this->dataStatusAndamentoOs);
        $stmt->bindParam(':id', $this->id);
        
        
        $rc = $stmt;

        if (false === $rc) {

            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
    }


}
