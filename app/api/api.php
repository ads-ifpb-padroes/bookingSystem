<?php

include("../database/DbConnection.php");
include("../interface/AcoesAoGerarRelatorio.php");
include("../interface/RelatorioInterface.php");
include("../util/relatorio/GerarRelatorio.php");
include("../util/relatorio/RelatorioEmCVS.php");
include("../util/relatorio/RelatorioEmPDF.php");
include("../util/acoes/EnviadorDeEmail.php");
include("../util/acoes/EnviadorDeSMS.php");
include("../entities/Relatorio.php");
include("../entities/Atracao.php");
include("../entities/Usuario.php");


//    $res = array('error' => false);

    $action = 'usuario';

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    if ($action == 'usuario') {
        $usuario = new Usuario(null, null, null, null);
        $usuario->setName('rodger');
        $usuario->setCpf('123');

        var_dump($usuario);
    }

    // Strategy (and Template Method) and Command (par AcoesAposGerar)
    if ($action == 'relatorio') {

        $atracoes = array(
            new Atracao(1, "Festa do rock", date("d/m/Y"), 150, time(2)),
            new Atracao(2, "Amostra de cultura", date("d/m/Y"), 50, time(3)),
            new Atracao(3, "Rock in Rio", date("d/m/Y"), 650, time(7))
        );


        $novoRelatorio = new Relatorio(1, $atracoes, 50);
        $gerarRelatorio = new GerarRelatorio();
        $gerarRelatorio->addAcao(new EnviadorDeEmail());
        $gerarRelatorio->addAcao(new EnviadorDeSMS());
        $gerarRelatorio->gerarRelatorio($novoRelatorio, new RelatorioEmCVS());
    }

    // Singleton
    if ($action == 'database') {
        $instance = DbConnection::getInstance();
        $conn = $instance->getConnection();

        if ($conn == null) {
            die("DbConnection: connection established failed..");
        }

        var_dump($conn);

        $conn= $instance->close();
    }


    if ($action == 'read') {

        $result = $conn->query("SELECT * FROM `users`");
        $users = array();

        while ($row = $result->fetch_assoc()) {
            array_push($users, $row);
        }
        $res['users'] = $users;
    }

    if ($action == 'create') {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];


        $result = $conn->query("INSERT INTO `users` (`username`, `email`, `mobile`) VALUES ('$username', '$email', '$mobile') ");
        if ($result) {
            $res['message'] = "Usuario Added successfully";
        } else {
            $res['error'] = true;
            $res['message'] = "Insert Usuario fail";
        }
    }

    if ($action == 'update') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];


        $result = $conn->query("UPDATE `users` SET `username` = '$username', `email` = '$email', `mobile` = '$mobile'WHERE `id` = '$id'");
        if ($result) {
            $res['message'] = "Usuario Updated successfully";
        } else {
            $res['error'] = true;
            $res['message'] = "Usuario Update failed";
        }
    }

    if ($action == 'delete') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];


        $result = $conn->query("DELETE FROM `users` WHERE `id` = '$id'");
        if ($result) {
            $res['message'] = "Usuario deleted successfully";
        } else {
            $res['error'] = true;
            $res['message'] = "Usuario delete failed";
        }
    }


    header("Content-type: application/json");
//    echo json_encode($res);
    die();