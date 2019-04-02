<?php
/**
 * Usuario: Roger
 */


class RelatorioEmCVS {

    public function gerar($relatorio) {

        echo "Relatório RelatorioEmCVS \n\n";

        $atracoes = $relatorio->getAtracoes();

        echo "Lista de atrações referentes ao mes: " . date("d/m/Y") . "\n";
        foreach($atracoes as $atracoe) {
            echo $atracoe->getId() . " - " .
                 $atracoe->getName() . " - " .
                 $atracoe->getDataEvento() . " - " .
                 $atracoe->getValorIngresso() . "\n";
        }

        $porcentagem = $relatorio->getPercentageReservas();
        echo "\nPorcentagem de cadeiras reservadas: " . ($porcentagem / 100);

        return true;

    }

    public function getAllReports() {
        // TODO: Implement getAllReports() method.
    }
}