<?php

//classe cliente
class Cliente {

    private $conn;
    private $table_name = "clientes";
    public $nome;
    public $email;
    public $dataCadastro;
    public $rg;
    public $cpf;
    public $telFixo;
    public $telCelular;
    public $endereco_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    //cria cadastro cliente
    function create() {

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nome = ?, email = ?, dataCadastro = ?, rg = ?, cpf = ?, telFixo = ?, telCelular = ?, endereco_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $this->dataCadastro);
        $stmt->bindParam(4, $this->rg);
        $stmt->bindParam(5, $this->cpf);
        $stmt->bindParam(6, $this->telFixo);
        $stmt->bindParam(7, $this->telCelular);
        $stmt->bindParam(8, $this->endereco_id);





        if ($stmt->execute()) {
         
            return true;
        } else {

            return false;
        }
    }


//lê um cliente para ser editado
    function readOne() {

        $query ="SELECT * from clientes WHERE cpf = ? LIMIT
                0,1";
        

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->cpf);

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->cpf = $row['cpf'];
        $this->endereco_id = $row['endereco_id'];
        $this->nome = $row['nome'];
        $this->email = $row['email'];
        $this->dataCadastro = $row['dataCadastro'];
        $this->rg = $row['rg'];
        $this->telFixo = $row['telFixo'];
        $this->telCelular = $row['telCelular'];
        
        
    }

     //lê todos os clientes
    function readAll() {
        $query = "SELECT nome, cpf, telCelular "
                . "FROM " . $this->table_name . "
                ORDER BY cpf";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

     //faz um update no cliente caso ele seja editado
    function update() {
        $query = "UPDATE 
                clientes
            SET 
                nome = :nome,
                email = :email,
                rg = :rg,
                telFixo = :telFixo,
                telCelular = :telCelular,
                endereco_id = :endereco_id
                
                
            WHERE
                cpf = :cpf";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':rg', $this->rg);
        $stmt->bindParam(':telFixo', $this->telFixo);
        $stmt->bindParam(':telCelular', $this->telCelular);
        $stmt->bindParam(':endereco_id', $this->endereco_id);
        
        
        $rc = $stmt;

        if (false === $rc) {

            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
    } 
    
    function validaCpf() {

        $query ="SELECT * from clientes WHERE cpf = ?";
        

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->cpf);

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
        
       if($stmt->rowCount() > 0){
           return true;
       }else{
           return false;
       }
        
    }
    
}


