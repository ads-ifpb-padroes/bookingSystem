<?php
/**
 * Created by rodger on 3/28/2019 7:44 PM
 */

interface DaoUsuarioInterface {
    function salvarUsuario($nome, $cpf, $email, $dataCadastro);

    function atualizarUsuario($nome, $cpf, $email, $dataCadastro);

    function removerUsuario($email);

    function buscarUsuario($email);

}