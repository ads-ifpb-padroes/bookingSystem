<?php

// set page headers
$page_title = "Create Atração";
include_once "header.php";

// read user button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Lista de Atrações ";
    echo "</a>";
echo "</div>";

// get database connection
include_once 'classes/database.php';
include_once 'initial.php';


// check if the form is submitted
if ($_POST){

    // instantiate user object
    include_once 'classes/atracao.php';
    $atracao = new atracao($db);

    // set Atração property values
    $atracao->nome = htmlentities(trim($_POST['nome']));
    $atracao->localizacao = htmlentities(trim($_POST['localizacao']));
    $atracao->dataEvento = htmlentities(trim($_POST['dataEvento']));
    $atracao->valorIngresso = htmlentities(trim($_POST['valorIngresso']));
    $atracao->duracaoEvento = $_POST['duracaoEvento'];

    // if the Atração able to create
    if($atracao->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Sua atração foi cadastrada.";
        echo "</div>";
    }

    // if the Atração unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Não foi possivel cadastrar está atração.";
        echo "</div>";
    }
}
?>

<!-- Bootstrap Form for creating a user -->
<form action='create.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome'  class='form-control' placeholder="Entre com o nome" required></td>
        </tr>

        <tr>
            <td>Local</td>
            <td><input type='text' name='localizacao' class='form-control' placeholder="Qual o local?" required></td>
        </tr>

        <tr>
            <td>Data do Evento</td>
            <td><input type='date' name='dataEvento' class='form-control' required></td>
        </tr>

        <tr>
            <td>Valor Ingresso</td>
            <td><input type='number' name='valorIngresso' class='form-control' placeholder="Qual valor do ingresso?" required></td>
        </tr>

        <tr>
            <td>Duração (min)</td>
            <td><input type='number' name='duracaoEvento' class='form-control' placeholder="Qual a duração em minutos?" required></td>
        </tr>

        <!-- <tr>
            <td>Category</td>
            <td>
                <?php
                    // // choose Atração seats
                    // include_once 'classes/category.php';

                    // $category = new Category($db);
                    // $prep_state = $category->getAll();
                    // echo "<select class='form-control' name='category_id'>";

                    //     echo "<option>--- Select Category ---</option>";

                    //     while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){

                    //         extract($row_category);

                    //         echo "<option value='$id'> $name </option>";
                    //     }
                    // echo "</select>";
                ?>
            </td>
        </tr> -->

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Cadastrar
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "footer.php";
?>

