<?php

// include database and object files
include_once 'classes/database.php';
include_once 'classes/reserva.php';
include_once 'classes/category.php';
include_once 'initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and user object
$reserva = new reserva($db);
$category = new Category($db);

// include header file
$page_title = "bookingSystem";
include_once "header.php";

// read Atracao button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Lista de Atrações ";
    echo "</a>";
echo "</div>";


// select all Reservas
$prep_state = $reserva->getTodasReservas($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Email</th>";
    
    echo "<th>CPF</th>";

    echo "<th>Atração</th>";

    echo "<th>Assento</th>";
    echo "</tr>";


    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";

        echo "<td>$row[nome]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[cpf]</td>";
        echo "<td>$row[atracao_id]</td>";
        echo "<td>$row[assento_id]</td>";
      

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // include pagination file
    include_once 'pagination-reserva.php';
}

// if there are no Atração
else{
    echo "<div> Não a nenhuma Atração cadastrada.</div>";
    }
?>


<?php
include_once "footer.php";
?>