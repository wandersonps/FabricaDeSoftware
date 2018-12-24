<?php

//classse login
class Usuario {

    private $conn;
    private $table_name = "usuarios";
    public $idUsuarios;
    public $nome;
    public $login;
    public $senha;
    public $perfil;
    public $statusAtividade;

    public function __construct($db) {
        $this->conn = $db;
    }

    //cria um login
    function create() {

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nome = ?, login = ?, senha = ?, perfil = ?, statusAtividade = ?";



        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->login);
        $stmt->bindParam(3, $this->senha);
        $stmt->bindParam(4, $this->perfil);
        $stmt->bindParam(5, $this->statusAtividade);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    //faz um update no usuario caso ele seja editado
    function update() {
        $query = "UPDATE 
                usuarios
            SET 
                nome = :nome,
                login = :login,
                senha = :senha,
                perfil = :perfil
                
            WHERE
                idUsuarios = :idUsuarios";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idUsuarios', $this->idUsuarios);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':perfil', $this->perfil);


        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    //faz um update no usuario caso ele seja editado
    function changeStatus() {
        $query = "UPDATE 
                usuarios
            SET 
                statusAtividade = :statusAtividade
                
            WHERE
                idUsuarios = :idUsuarios";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idUsuarios', $this->idUsuarios);
        $stmt->bindParam(':statusAtividade', $this->statusAtividade);

        $rc = $stmt;

        if (false === $rc) {

            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }
    }

    //lê um usuario para ser editado
    function readOne() {
        $query = "SELECT
                 idUsuarios,nome,login,senha,perfil
                FROM " . $this->table_name . "
            WHERE
                idUsuarios = ?
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUsuarios);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->idUsuarios = $row['idUsuarios'];
        $this->nome = $row['nome'];
        $this->senha = $row['senha'];
        $this->login = $row['login'];
        $this->perfil = $row['perfil'];
    }

    //verifica se o usuario existe na tabela login

    function logando() {


        $query = "SELECT *

                    FROM  " . $this->table_name . "
                WHERE
                    login = ? and
                    senha = ?
                LIMIT
                    1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->login);
        $stmt->bindParam(2, $this->senha);

        $stmt->execute();

        return $stmt;
    }

    //verifica se o usuario existe na tabela login

    function verificaLogin() {


        $query = "SELECT *

                    FROM  " . $this->table_name . "
                WHERE
                    login = ?
                LIMIT
                    1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->login);

        $rc = $stmt;

        if (false === $rc) {

            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }

        $rc = $stmt->execute();

        if (false === $rc) {
            die('execute() failed: ' . print_r($stmt->errorInfo()));
        }

        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    //recupera o nivel de acesso do usuario

    function recuperaPerfil() {


        $query = "SELECT *

                    FROM  " . $this->table_name . "
                WHERE
                    login = ? and
                    senha = ?
                LIMIT
                    1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->login);
        $stmt->bindParam(2, $this->senha);

        $stmt->execute();

        return $stmt->fetch();
    }

    //lê todos os usuarios
    function readAll() {
        $query = "SELECT idUsuarios,nome, login,perfil,statusAtividade "
                . "FROM " . $this->table_name . "
                ORDER BY nome";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
