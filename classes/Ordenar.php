<?php
include("order/OrdenarAtracao.php");
include("order/OrdenarPorData.php");
include("order/OrdenarPorValor.php");
include("order/OrdenarStatus.php");

$type = isset($_GET['type']) ? $_GET['type'] : die('ERROR! Não foi possivel fazer a busca!');

$porValor = new OrdenarPorValor($db);
$porData = new OrdenarPorData($db);

$porValor->sucedicoPor($porData);

$status = new OrdenarStatus();

if($type == 'data') {
    $status->setPorData = false;    
} elseif ($type == 'valor'){
    $status->setPorValor = false;    
}

try {
    $porValor->checar($status);
} catch (Exception $e) {
    echo $e->getMessage();
}