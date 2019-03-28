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
        $this->email = $usuario->getEmail();
        $this->dataCadastro =$usuario->getDataCadastro();
    }

    public function salvar($databaseType) {

        $dao = new UsuarioDao($databaseType);

        $result = $dao->salvarUsuario(
            $this->nome,
            $this->cpf,
            $this->email,
            $this->dataCadastro
        );

        if ($result)
            return true;
        return false;
    }

}