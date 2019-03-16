<?php
/**
 * Created by IntelliJ IDEA.
 * Usuario: Roger
 * Date: 3/9/2019
 * Time: 6:54 PM
 */

class Atracao {
    private $id;
    private $name;
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
    public function __construct($id, $name, $dataEvento, $valorIngresso, $duracaoEvento) {
        $this->id = $id;
        $this->name = $name;
        $this->dataEvento = $dataEvento;
        $this->valorIngresso = $valorIngresso;
        $this->duracaoEvento = $duracaoEvento;
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
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void {
        $this->name = $name;
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