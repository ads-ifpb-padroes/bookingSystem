<?php
/**
 * Created by rodger on 3/28/2019 6:37 PM
 */

class UsuarioDao implements DaoUsuarioInterface {

    protected $DB;

    protected $novoUsuarioSQL = 'INSERT INTO usuario(nome, cpf, email, datacadastro)
                            VALUES(:nome, :cpf, :email, :datacadastro)';

    /**
     * UsuarioDao constructor.
     */
    public function __construct($Database) {
        $dbFactory = new DbFactory();
        $dbFactory->setDatabase($Database);
        $this->DB = $dbFactory->newConnection();
    }


    /**
     * @param $nome
     * @param $cpf
     * @param $email
     * @param $dataCadastro
     * @return true se usuário foi cadastrado, caso contrario retorna false
     */
    public function salvarUsuario($nome, $cpf, $email, $dataCadastro) {
        $connection = $this->DB->getConn();

        $sth = $connection->prepare($this->novoUsuarioSQL);
        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sth->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':datacadastro', $dataCadastro);
        $result = $sth->execute();

        return $result;
    }

    public function atualizarUsuario($nome, $cpf, $email, $dataCadastro) {
        // TODO: Implement atualizarUsuario() method.
    }

    public function removerUsuario($id) {
        // TODO: Implement removerUsuario() method.
    }

    public function buscarUsuario($id) {
        // TODO: Implement buscarUsuario() method.
    }
}