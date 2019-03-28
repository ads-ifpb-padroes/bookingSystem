<?php

//    function __autoload ( $class_name ) {
//        include   "../entities/" . $class_name  .  '.php' ;
//    }

    include("../database/DbConnection.php");
    include("../database/DbFactory.php");
    include("../database/PostgreSQL.php");

    include("../interface/AcoesAoGerarRelatorio.php");
    include("../interface/RelatorioInterface.php");
    include("../interface/DaoUsuarioInterface.php");
    include("../interface/DaoAtracaoInterface.php");

    include("../controller/UsuarioControl.php");
    include("../controller/AtracaoControl.php");

    include("../util/relatorio/GerarRelatorio.php");
    include("../util/relatorio/RelatorioEmCVS.php");
    include("../util/relatorio/RelatorioEmPDF.php");

    include("../util/acoes/EnviadorDeEmail.php");
    include("../util/acoes/EnviadorDeSMS.php");

    include("../entities/Relatorio.php");
    include("../entities/Atracao.php");
    include("../entities/Usuario.php");

    include("../dao/UsuarioDao.php");
    include("../dao/AtracaoDao.php");



    $res = array('error' => false);

    $action = 'listar_atracao';

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    if ($action == 'salvar_usuario') {

        // definir banco utilizado
        $MySQL_Db = new MySQL();

        $usuario = new Usuario();

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];

        $usuario->setName($nome);
        $usuario->setCpf($cpf);
        $usuario->setEmail($email);
        $usuario->setDataCadastro(date("Y-m-d H:i:s"));

        $usuarioControl = new UsuarioControl($usuario);

        if ($usuarioControl->salvar($MySQL_Db)) echo "Usuario cadastrado";
        else echo "Erro ao cadastrar usuario, EMAIL ou CPF existente";
    }

    if ($action == 'salvar_atracao') {
        // defino o banco
        $MySQL_Db = new MySQL();

        $atracao = new Atracao();

//        $nome = $_POST['nome'];
//        $preco = $_POST['preco'];
//        $local = $_POST['local'];
//        $duracao = $_POST['duracao'];
//        $dataEvento = $_POST['dataEvento'];

        $nome = 'Rock in Rio';
        $local = 'Praça do Rock Cajazeiras';
        $preco = 40.99;
        $duracao = 120;
        $dataEvento = date("Y-m-d H:i:s");

        $atracao->setNome($nome);
        $atracao->setLocal($local);
        $atracao->setValorIngresso($preco);
        $atracao->setDuracaoEvento($duracao);
        $atracao->setDataEvento($dataEvento);

        $atracaoControl = new AtracaoControl($atracao);

        if ($atracaoControl->salvar($MySQL_Db)) echo "Atração cadastrada";
        else echo "Erro ao cadastrar";
    }

    if ($action == 'listar_atracoes') {
        // defino o banco
        $MySQL_Db = new MySQL();

        $atracao = new Atracao();

        $atracaoControl = new AtracaoControl($atracao);

        $atracaoControl->listar($MySQL_Db);
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