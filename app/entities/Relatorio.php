<?php
/**
 * Usuario: Roger
 */

class Relatorio {
    private $id;
    private $atracoes;
    private $percentageReservas;

    /**
     * Relatorio constructor.
     * @param $id
     * @param $atracoes
     * @param $percentageReservas
     */
    public function __construct($id, $atracoes, $percentageReservas) {
        $this->id = $id;
        $this->atracoes = $atracoes;
        $this->percentageReservas = $percentageReservas;
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
    public function getAtracoes() {
        return $this->atracoes;
    }

    /**
     * @param mixed $atracoes
     */
    public function setAtracoes($atracoes): void {
        $this->atracoes = $atracoes;
    }

    /**
     * @return mixed
     */
    public function getPercentageReservas() {
        return $this->percentageReservas;
    }

    /**
     * @param mixed $percentageReservas
     */
    public function setPercentageReservas($percentageReservas): void {
        $this->percentageReservas = $percentageReservas;
    }



}