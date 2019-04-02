<?php
/**
 * User: Roger
 */

class EnviadorDeEmail implements AcoesAoGerarRelatorio {

    /**
     * EnviadorDeEmail constructor.
     */
    public function __construct() { }

    public function executa(Relatorio $reratorio) {

        echo "\n\nEnviando por e-mail: \n";
        print_r($reratorio);

    }

}