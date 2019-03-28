<?php
/**
 * Created by rodger on 3/28/2019 5:50 PM
 */

interface DaoAtracaoInterface{
    function salvarAtracao($nome, $local, $dataEvento, $valorIngresso, $duracaoEvento);

    function atualizarAtracao($nome, $local, $dataEvento, $valorIngresso, $duracaoEvento);

    function removerAtracao($id);

    function listarAtracoes();

    function buscarAtracao($id);
}