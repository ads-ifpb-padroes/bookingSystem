<?php
/**
 * Created by rodger on 3/28/2019 4:57 PM
 */

class Acento {
    private $id;
    private $atracao;

    /**
     * Acento constructor.
     * @param $id
     * @param $atracao
     */
    public function __construct($id, $atracao) {
        $this->id = $id;
        $this->atracao = $atracao;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAtracao() {
        return $this->atracao;
    }

    /**
     * @param mixed $atracao
     */
    public function setAtracao($atracao): void {
        $this->atracao = $atracao;
    }



}