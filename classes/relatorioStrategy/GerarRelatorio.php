<?php

class GerarRelatorio {
    private $atracoesDados;
    private $acoesAoGerar;

    public function __construct() {
        $this->acoesAoGerar;
    }

    public function addAcao(AcoesAoGerarRelatorio $acao) {
        $this->acoesAoGerar[] = $acao;
    }
    
    public function gerarRelatorio(Relatorio $relatorio, $tipo) {
        $relatorioGerado = $tipo->gerar($relatorio);

        foreach ($this->acoesAoGerar as $acao) {
            $acao->executa($relatorio);
        }

        return $relatorioGerado;
    }

    public function todosOsRelatorios($type) {
        // TODO: Implement getAllReports() method.
    }
}
