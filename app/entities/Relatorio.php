<?php
/**
 * Usuario: Roger
 */

class Relatorio {
    private $id;
    private $atracoes;
    private $usuario;

    /**
     * Relatorio constructor.
     * @param $id
     * @param $atracoes
     * @param $usuario
     */
    public function __construct($id, $atracoes, $usuario) {
        $this->id = $id;
        $this->atracoes = $atracoes;
        $this->usuario = $usuario;
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
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

}