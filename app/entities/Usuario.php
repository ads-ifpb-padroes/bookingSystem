<?php

/**
 * Usuario: Roger
 */

class Usuario {
    private $id;
    private $name;
    private $cpf;
    private $email;

    /**
     * Usuario constructor.
     * @param $id
     * @param $name
     * @param $cpf
     * @param $email
     */
    public function __construct($id, $name, $cpf, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
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
    public function setId($id) {
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
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }



}