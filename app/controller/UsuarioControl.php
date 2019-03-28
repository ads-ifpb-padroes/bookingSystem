<?php

/**
 * Usuario: Roger
 */
class UsuarioControl {
    private $nome;
    private $cpf;
    private $email;
    private $dataCadastro;

    /**
     * UsuarioControl constructor.
     * @param $nome
     * @param $cpf
     * @param $email
     * @param $dataCadastro
     */
    public function __construct(Usuario $usuario) {
        $this->nome = $usuario->getName();
        $this->cpf = $usuario->getCpf();
        $this->email = $usuario->getCpf();
        $this->dataCadastro =$usuario->getDataCadastro();
    }


    public function salvar() {

        $dao = new UsuarioDao(new MySQL());

        $dao->salvarUsuario($this->nome, $this->cpf, $this->email, $this->dataCadastro);

        return true;
    }

}