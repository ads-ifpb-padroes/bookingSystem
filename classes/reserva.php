<?php

class Reserva
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "reserva";

    // object properties
    public $id;
    private $nome;
    private $email;
    private $cpf;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nome = ?, email = ?, cpf = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nome);
        $prep_state->bindParam(2, $this->email);
        $prep_state->bindParam(3, $this->cpf);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }
}
