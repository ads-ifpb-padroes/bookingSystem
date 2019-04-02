<?php
/**
 * Usuario: Roger
 */

interface RelatorioInterface {

    public function gerarRelatorio(Relatorio $report, $type);

    public function todosOsRelatorios($type);

}