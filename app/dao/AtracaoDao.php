<?php
/**
 * Created by rodger on 3/28/2019 5:48 PM
 */

class AtracaoDao implements DaoAtracaoInterface {

    protected $DB;

    protected $novaAtracaoSQL = 'INSERT INTO atracao(nome, localizacao, dataEvento, valorIngresso, duracaoEvento)
                                 VALUES(:nome, :localizacao, :dataEvento, :valorIngresso, :duracaoEvento)';

    protected $todasAtracoesSQL = 'SELECT id, nome, localizacao, dataEvento, valorIngresso, duracaoEvento
                                 FROM atracao';
    /**
     * UsuarioDao constructor.
     */
    public function __construct($Database) {
        $dbFactory = new DbFactory();
        $dbFactory->setDatabase($Database);
        $this->DB = $dbFactory->newConnection();
    }

    public function salvarAtracao($nome, $localizacao, $dataEvento, $valorIngresso, $duracaoEvento) {
        $connection = $this->DB->getConn();

        $sth = $connection->prepare($this->novaAtracaoSQL);
        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sth->bindParam(':localizacao', $localizacao, PDO::PARAM_STR);
        $sth->bindParam(':dataEvento', $dataEvento);
        $sth->bindParam(':valorIngresso', $valorIngresso);
        $sth->bindParam(':duracaoEvento', $duracaoEvento, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }

    public function listarAtracoes() {
        $connection = $this->DB->getConn();

        $sth = $connection->prepare($this->todasAtracoesSQL);
        $sth->execute();
        $atracoes = $sth->fetchAll();

        print_r(json_encode($atracoes, JSON_PRETTY_PRINT));
    }

    public function atualizarAtracao($nome, $local, $dataEvento, $valorIngresso, $duracaoEvento) {
        // TODO: Implement atualizarAtracao() method.
    }

    public function removerAtracao($id) {
        // TODO: Implement removerAtracao() method.
    }

    public function buscarAtracao($id) {
        // TODO: Implement buscarAtracao() method.
    }
}