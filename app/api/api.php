<?php

//    function __autoload ( $class_name ) {
//        include   "../entities/" . $class_name  .  '.php' ;
//    }

    include("../database/DbConnection.php");
    include("../database/DbFactory.php");
    include("../database/PostgreSQL.php");
    include("../interface/AcoesAoGerarRelatorio.php");
    include("../interface/RelatorioInterface.php");
    include("../interface/DaoInterface.php");
    include("../controller/UsuarioControl.php");
    include("../util/relatorio/GerarRelatorio.php");
    include("../util/relatorio/RelatorioEmCVS.php");
    include("../util/relatorio/RelatorioEmPDF.php");
    include("../util/acoes/EnviadorDeEmail.php");
    include("../util/acoes/EnviadorDeSMS.php");
    include("../entities/Relatorio.php");
    include("../entities/Atracao.php");
    include("../entities/Usuario.php");
    include("../dao/UsuarioDao.php");

    
    $res = array('error' => false);

    $action = 'dbFactory';

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    if ($action == 'novoUsuario') {

        $usuario = new Usuario();

//        $nome = $_POST['nome'];
//        $cpf = $_POST['cpf'];
//        $email = $_POST['email'];

        $nome = 'rogerio';
        $cpf = '11234';
        $email = 'rogeiro@mail.com';

        $usuario->setName($nome);
        $usuario->setCpf($cpf);
        $usuario->setEmail($usuario);
        $usuario->setDataCadastro(date("Y-m-d H:i:s"));

        $usuarioControl = new UsuarioControl($usuario);

        if ($usuarioControl->salvar()) echo "Usuario cadastrado";
        else echo "Erro ao cadastrar usuario";
    }

    // Strategy (and Template Method) and Command (para AcoesAposGerar)
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

    // Singleton (deprecated)
    if ($action == 'database') {
        session_start();

        $instance = DbConnection::getInstance();
        $conn = $instance->getConnection();

        if ($conn == null) {
            die("DbConnection: connection established failed..");
        }

        echo "CONNECTION\n";
        var_dump($conn);

        echo "\n\nSESSION ID: ";
        var_dump(session_id());

        echo "\n\nCONNECTION ID 1: ";
        $dbh = $conn;
        print_r($dbh->query('SELECT CONNECTION_ID()')->fetch(PDO::FETCH_ASSOC));

        $conn= $instance->close();
    }

    // Factory and Strategy
    if  ($action == 'dbFactory') {
        session_start();
        $dbFactory = new DbFactory();
        $dbFactory->setDatabase(new MySQL());
        $DB = $dbFactory->newConnection();
//        $DB = $dbFactory->makeConnection('localhost', 'root', '', 'mysql');

        echo "CONNECTION\n";
        var_dump($DB);

        echo "\n\nSESSION ID: ";
        var_dump(session_id());

        echo "\n\nCONNECTION ID: ";
        $dbh = $DB->getConn();
        print_r($dbh->query('SELECT CONNECTION_ID()')->fetch(PDO::FETCH_ASSOC));

//        $DB->close();
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
//    die();