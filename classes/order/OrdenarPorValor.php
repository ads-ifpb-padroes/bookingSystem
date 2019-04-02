<?php
class OrdenarPorValor extends OrdenarAtracao
{
    public $db_conn = NULL;
    public $table_name = 'atracao';

    public function checar(OrdenarStatus $status)
    {
        if (!$status->porValor) {
            echo "lista por valor";
            return $this->getTodasPorValor();
        }
        $this->proximo($status);
    }

    function getTodasPorValor()
    {

        $sql = "SELECT id, nome, localizacao, dataEvento, valorIngresso, duracaoEvento, assentoQuantidade FROM " . $this->table_name . " ORDER BY valorIngresso";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->execute();
        $result = $prep_state->fetchAll();
        

        print_r($result);
        return $prep_state;
        $db_conn = NULL;
    }
}