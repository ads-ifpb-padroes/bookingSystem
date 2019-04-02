<?php

class Atracao
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "atracao";

    // object properties
    public $id;
    public $nome;
    public $localizacao;
    public $dataEvento;
    public $valorIngresso;
    public $duracaoEvento;
    public $assentoQuantidade;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome): void {
        $this->id = $nome;
    }

    public function getLocalizacao() {
        return $this->localizacao;
    }

    public function setEmail($Email): void {
        $this->id = $Email;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($id): void {
        $this->id = $cpf;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nome = ?, localizacao = ?, dataEvento = ?, valorIngresso = ?, duracaoEvento = ?, assentoQuantidade = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nome);
        $prep_state->bindParam(2, $this->localizacao);
        $prep_state->bindParam(3, $this->dataEvento);
        $prep_state->bindParam(4, $this->valorIngresso);
        $prep_state->bindParam(5, $this->duracaoEvento);
        $prep_state->bindParam(6, $this->assentoQuantidade);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET nome = :nome, localizacao = :localizacao, dataEvento = :dataEvento, valorIngresso = :valorIngresso, duracaoEvento  = :duracaoEvento, assentoQuantidade = :assentoQuantidade  WHERE id = :id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':nome', $this->nome);
        $prep_state->bindParam(':localizacao', $this->localizacao);
        $prep_state->bindParam(':dataEvento', $this->dataEvento);
        $prep_state->bindParam(':valorIngresso', $this->valorIngresso);
        $prep_state->bindParam(':duracaoEvento', $this->duracaoEvento);
        $prep_state->bindParam(':assentoQuantidade', $this->assentoQuantidade);
        $prep_state->bindParam(':id', $this->id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete($id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);

        if ($prep_state->execute(array(":id" => $_GET['id']))) {
            return true;
        } else {
            return false;
        }
    }


    function getTodasAtracoes($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, nome, localizacao, dataEvento, valorIngresso, duracaoEvento, assentoQuantidade FROM " . $this->table_name . " ORDER BY id ASC LIMIT ?, ?";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // for edit Atracao form when filling up
    function getAtracao()
    {
        $sql = "SELECT nome, localizacao, dataEvento, valorIngresso, duracaoEvento, assentoQuantidade FROM " . $this->table_name . " WHERE id = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->localizacao = $row['localizacao'];
        $this->dataEvento = $row['dataEvento'];
        $this->valorIngresso = $row['valorIngresso'];
        $this->duracaoEvento = $row['duracaoEvento'];
        $this->assentoQuantidade = $row['assentoQuantidade'];
    }


}







