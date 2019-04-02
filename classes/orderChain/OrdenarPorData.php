<?php

class OrdenarPorData extends OrdenarAtracao
{
    public $db_conn = NULL;
    public $table_name = 'atracao';

    public function __construct($db)
    {
        $this->db_conn = $db;
    }
    public function checar(OrdenarStatus $status)
    {
        if (!$status->porData) {
            echo "Atrções listadas por data <br/>";
            return $this->getTodasPorData();
        }
        $this->proximo($status);
    }

    function getTodasPorData()
    {

        $sql = "SELECT id, nome, localizacao, dataEvento, valorIngresso, duracaoEvento, assentoQuantidade FROM " . $this->table_name . " ORDER BY date(dataEvento)";


        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->execute();
        $result = $prep_state->fetchAll();
        

        print_r($result);
        return $prep_state;
        $db_conn = NULL;
    }

}