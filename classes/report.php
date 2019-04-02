<?php

$relatorio = new Relatorio();

$dataEvento = $_POST['dataEvento'];
$usuarioEmail = $_POST['usuarioEmail'];

$novoRelatorio = new Relatorio(1, $atracoes, 50);
$gerarRelatorio = new GerarRelatorio();
$gerarRelatorio->addAcao(new EnviadorDeEmail());
$gerarRelatorio->addAcao(new EnviadorDeSMS());
$gerarRelatorio->gerarRelatorio($novoRelatorio, new RelatorioEmCVS());