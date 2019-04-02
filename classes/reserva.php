<?php

class Reserva
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "reserva";

    // object properties
    private $id;
    private $nome;
    private $email;
    private $cpf;
    private $assento;
    private $atracao;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getAssento()
    {
        return $this->assento;
    }

    public function setAssento($assento): void
    {
        $this->assento = $assento;
    }

    public function getAtracaoo()
    {
        return $this->atracao;
    }

    public function setAtracao($atracao): void
    {
        $this->atracao = $atracao;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nome = ?, email = ?, cpf = ?, assento_id = ?, atracao_id = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nome);
        $prep_state->bindParam(2, $this->email);
        $prep_state->bindParam(3, $this->cpf);
        $prep_state->bindParam(4, $this->assento);
        $prep_state->bindParam(5, $this->atracao);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }

    function getTodasReservas($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, nome, email, cpf, atracao_id, assento_id FROM " . $this->table_name . " ORDER BY id ASC LIMIT ?, ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }
}
