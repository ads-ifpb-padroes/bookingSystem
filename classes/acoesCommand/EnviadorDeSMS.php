<?php
/**
 * User: Roger
 */

class EnviadorDeSMS implements AcoesAoGerarRelatorio {

    public function executa(Relatorio $relatorio) {
        echo "\n\nEnviando por sms: \n";
        print_r($relatorio);
    }
}