<?php
/**
 * Created by rodger on 3/28/2019 4:58 PM
 */

class Reserva {
    private $id;
    private $usuario;
    private $atracao;
    private $acento;

    /**
     * Reserva constructor.
     * @param $id
     * @param $usuario
     * @param $atracao
     * @param $acento
     */
    public function __construct($id, $usuario, $atracao, $acento) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->atracao = $atracao;
        $this->acento = $acento;
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
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
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

    /**
     * @return mixed
     */
    public function getAcento() {
        return $this->acento;
    }

    /**
     * @param mixed $acento
     */
    public function setAcento($acento): void {
        $this->acento = $acento;
    }


}