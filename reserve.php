<?php
// set page headers
$page_title = "Reservando atração";
include_once "header.php";

// read user button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Ver Atrações ";
    echo "</a>";
echo "</div>";

// isset() is a PHP function used to verify if ID is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object user file
include_once 'classes/database.php';
include_once 'classes/atracao.php';
include_once 'classes/reserva.php';
include_once 'initial.php';

// instantiate Atração object
$atracao = new Atracao($db);
// instantiate Reserva object
$reserva = new Reserva($db);
$atracao->id = $id;
$atracao->getAtracao();

// check if the form is submitted
if($_POST)
{

    // set user property values
    // $atracao->nome = htmlentities(trim($_POST['nome']));
    // $atracao->localizacao = htmlentities(trim($_POST['localizacao']));
    // $atracao->dataEvento = htmlentities(trim($_POST['dataEvento']));
    // $atracao->valorIngresso = htmlentities(trim($_POST['valorIngresso']));
    // $atracao->duracaoEvento = $_POST['duracaoEvento'];
    $reserva->setNome($_POST['nome']);
    $reserva->setEmail($_POST['email']);
    $reserva->setCpf($_POST['cpf']);
    $reserva->setAssento($_POST['assento']);
    $reserva->setAtracao($id);

    // Edit user
    if($reserva->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Seu assento foi reservado."; //Enviamos um email com mais informações.";
        echo "</div>";
    }

    // if unable to edit user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Não foi possivel reservar um assento nessa Atração.";
        echo "</div>";
    }
}
?>

        <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nome do Evento</td>
            <td><input type='text' name='nome' value='<?php echo $atracao->nome;?>'  class='form-control' placeholder="Enter First Name" disabled></td>
        </tr>

        <tr>
            <td>Local</td>
            <td><input type='text' name='localizacao' value='<?php echo $atracao->localizacao;?>' class='form-control' placeholder="Enter Last Name" disabled></td>
        </tr>

        <tr>
            <td>Data do Evento</td>
            <td><input type='date' name='dataEvento' value='<?php echo DateTime::createFromFormat("Y-m-d H:i:s", $atracao->dataEvento)->format("Y-m-d");?>'  class='form-control' placeholder="Enter Email Address " disabled></td>
        </tr>
        <tr>
            <td>Valor do Ingresso</td>
            
            <td><input type='number' name='valorIngresso' value='<?php echo $atracao->valorIngresso;?>' class='form-control' placeholder="Enter Mobile Number" disabled></td>
        </tr>
        <tr>
            <td>Duração (min)</td>
            <td><input type='number' name='duracaoEvento' value='<?php echo $atracao->duracaoEvento;?>' class='form-control' placeholder="Enter Mobile Number" disabled></td>
        </tr>
    <!-- Bootstrap Form for reserve a Atração -->
    <form action='reserve.php?id=<?php echo $id; ?>' method='post'>
        <tr>
            <td>Nome Completo</td>
            <td><input type='text' name='nome' class='form-control' placeholder="Seu nome" Required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' placeholder="Seu e-mail aqui" Required></td>
        </tr>

        <tr>
            <td>CPF</td>
            <td><input type='txt' pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" name='cpf' class='form-control' placeholder="Só pra confirmarmos tudo, seu CPF (###.###.###-##)" min="14" max="18" Required></td>
        </tr>

        <tr>
            <td>Assentos</td>
            <td>
            
                <?php
                $quantidade = $atracao->assentoQuantidade;
                
                $sql = "SELECT assento_id FROM reserva WHERE atracao_id = :id";

                $prep_state = $db->prepare($sql);
                $prep_state->bindParam(':id', $id);
                $prep_state->execute();

                $row = $prep_state->fetchAll();
               
                echo '<select name="assento" class="form-control" id="exampleFormControlSelect1">';
                echo '<option>--- Selecione o Assento ---</option>';
                for ($x = 1; $x <= $quantidade; $x++) {
                    $disable = "";
                    for($a = 0; $a < sizeof($row); $a++) {
                        if($row[$a]['assento_id'] == $x) $disable = "disabled";
                    }

                    echo '<option value="'. $x .'" '. $disable .'>'.$x.'</option>';

                    $disable = "";
                }    
                echo '</select>';
                
               
                ?>
            
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-info" >
                    <span class=""></span> Reservar
                </button>
            </td>
        </tr>

        </table>
    </form>

<?php
include_once "footer.php";
?>