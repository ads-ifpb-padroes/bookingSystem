<?php
/**
 * Created by IntelliJ IDEA.
 * Usuario: Roger
 * Date: 3/9/2019
 * Time: 6:54 PM
 */

class Atracao {
    private $id;
    private $nome;
    private $local;
    private $dataEvento;
    private $valorIngresso;
    private $duracaoEvento;

    /**
     * Atracao constructor.
     * @param $id
     * @param $name
     * @param $dataEvento
     * @param $valorIngresso
     * @param $duracaoEvento
     */

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
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getLocal() {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local): void {
        $this->local = $local;
    }

    /**
     * @return mixed
     */
    public function getDataEvento() {
        return $this->dataEvento;
    }

    /**
     * @param mixed $dataEvento
     */
    public function setDataEvento($dataEvento): void {
        $this->dataEvento = $dataEvento;
    }

    /**
     * @return mixed
     */
    public function getValorIngresso() {
        return $this->valorIngresso;
    }

    /**
     * @param mixed $valorIngresso
     */
    public function setValorIngresso($valorIngresso): void {
        $this->valorIngresso = $valorIngresso;
    }

    /**
     * @return mixed
     */
    public function getDuracaoEvento() {
        return $this->duracaoEvento;
    }

    /**
     * @param mixed $duracaoEvento
     */
    public function setDuracaoEvento($duracaoEvento): void {
        $this->duracaoEvento = $duracaoEvento;
    }




}