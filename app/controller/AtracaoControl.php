<?php
/**
 * Usuario: Roger
 */

class AtracaoControl {
    private $atracao;


    /**
     * AtracaoControl constructor.
     * @param Atracao $atracao
     */
    public function __construct(Atracao $atracao) {
        $this->atracao = $atracao;
    }

    public function salvar($databaseType) {

        $dao = new AtracaoDao($databaseType);

        $result = $dao->salvarAtracao(
            $this->atracao->getNome(),
            $this->atracao->getLocal(),
            $this->atracao->getDataEvento(),
            $this->atracao->getValorIngresso(),
            $this->atracao->getDuracaoEvento()
        );

        if ($result)
            return true;
        return false;
    }

    public function listar($databaseType) {

        $dao = new AtracaoDao($databaseType);

        $result = $dao->listarAtracoes();

        if ($result)
            return true;
        return false;
    }

}