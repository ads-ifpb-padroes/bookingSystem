<?php

class Relatorio
{
    public $db_conn;
    public $table_name = "atracao";

    public function __construct($db)
    {
        $this->db_conn = $db;
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
}