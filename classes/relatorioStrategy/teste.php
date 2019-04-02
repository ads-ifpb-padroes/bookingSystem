<?php

$relatorio = new Relatorio();

// $dataEvento = $_POST['dataEvento'];
// $usuarioEmail = $_POST['usuarioEmail'];

$dataEvento = "12-04-2019";
$usuarioEmail = "usuario@mail.com";

$novoRelatorio = new Relatorio(1, $atracoes);
$gerarRelatorio = new GerarRelatorio();

$gerarRelatorio->addAcao(new EnviadorDeEmail());
$gerarRelatorio->addAcao(new EnviadorDeSMS());

$gerarRelatorio->gerarRelatorio($novoRelatorio, new RelatorioEmCVS());