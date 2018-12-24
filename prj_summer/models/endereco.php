<?php

//classe endereco do cliente
class Endereco {

    private $conn;
    private $table_name = "endereco"; 
  
    public $id;
    public $logradouro;
    public $numero;
    public $bairro;
    public $uf;
    public $cidade;
    public $cep;
 
    public function __construct($db){
        $this->conn = $db;
    }
    
    //cria um endereço
    function create(){

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    logradouro = ?, numero = ?, bairro = ?, uf = ?, cidade = ?, cep = ?";
 
        $stmt = $this->conn->prepare($query);
 

        $stmt->bindParam(1, $this->logradouro);
        $stmt->bindParam(2, $this->numero);
        $stmt->bindParam(3, $this->bairro);
        $stmt->bindParam(4, $this->uf);
        $stmt->bindParam(5, $this->cidade);
        $stmt->bindParam(6, $this->cep);
            
        
        if($stmt->execute()){

            return true;
        }else{

            return false;
        }       
        
        
    }    

    // Função que retorna o id do endereço para ser inserido no cliente
    public function retornaID(){

        $query = "SELECT id FROM
                    " . $this->table_name . "
                    WHERE
                    logradouro = ? and numero = ? and cep = ? limit 1";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->logradouro);
        $stmt->bindParam(2, $this->numero);
        $stmt->bindParam(3, $this->cep);

        if($stmt->execute()){
            return $stmt->fetch();
        }else{

            return false;
        }

    }

    //lê um endereco para ser editado
    function readOne() {

        $query = "SELECT * from endereco WHERE id = ? LIMIT
                0,1";
        




        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->logradouro = $row['logradouro'];
        $this->numero = $row['numero'];
        $this->bairro = $row['bairro'];
        $this->uf = $row['uf'];
        $this->cidade = $row['cidade'];
        $this->cep = $row['cep'];
        $this->id = $row['id'];
        
    }

     //faz um update no endereco caso ele seja editado
    function update() {
        $query = "UPDATE 
                endereco
            SET 
                logradouro = :logradouro,
                numero = :numero,
                bairro = :bairro,
                uf = :uf,
                cidade = :cidade,
                cep = :cep
            WHERE
                id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':logradouro', $this->logradouro);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':bairro', $this->bairro);
        $stmt->bindParam(':uf', $this->uf);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':cidade', $this->cidade);
        
        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }
    
}