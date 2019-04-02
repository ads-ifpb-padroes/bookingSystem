<?php

// include database and object files
include_once 'classes/database.php';
include_once 'classes/atracao.php';
include_once 'classes/category.php';
include_once 'initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and user object
$atracao = new atracao($db);
$category = new Category($db);

// include header file
$page_title = "bookingSystem";
include_once "header.php";

// criar atração button
echo "<div class='right-button-margin'>";
echo "<a href='create.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Add Atração";
echo "</a>";
echo "</div>";

// criar relatório button
echo "<div class='right-button-margin'>";
echo "<a href='generate.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon glyphicon-tasks'></span> Gerar Relatório";
echo "</a>";
echo "</div>";

// read Reserva button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Reservas ";
    echo "</a>";
echo "</div>";

// criar relatório button
// echo "<div class='right-button-margin'>";
// echo "<a href='reserve.php?id=' class='btn btn-info delete-object'>";
// echo "<span class='glyphicon glyphicon-edit'></span>Ordenar Atrações";
// echo "</a>";
// echo "</div>";

// select all users
$prep_state = $atracao->getTodasAtracoes($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Localização</th>";
    
    echo "<th><a href='ordenar.php?type=data'>";
    echo "Data";
    echo "</a></th>";

    echo "<th><a href='ordenar.php?type=valor'>";
    echo "Ingresso";
    echo "</a></th>";

    echo "<th>Duração</th>";
    echo "<th>Ações</th>";
    echo "</tr>";


    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";

        echo "<td>$row[nome]</td>";
        echo "<td>$row[localizacao]</td>";
        echo "<td>$row[dataEvento]</td>";
        echo "<td>$row[valorIngresso]</td>";
        echo "<td>$row[duracaoEvento]</td>";
        // echo "<td>";
        //             $category->id = $category_id;
		// 			$category->getName();
		// 			echo $category->name;
        // echo "</td>";

        
        echo "<td>";
        // edit Atração button
        echo "<a href='edit.php?id=" . $id . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Editar";
        echo "</a>";

        // delete Atração button
        echo "<a href='delete.php?id=" . $id . "' class='btn btn-danger delete-object left-margin'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Deletar";
        echo "</a>";

        // reserve Atração button
        echo "<a href='reserve.php?id=" . $id . "' class='btn btn-info delete-object'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Reservar";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // include pagination file
    include_once 'pagination.php';
}

// if there are no Atração
else{
    echo "<div> Não a nenhuma Atração cadastrada.</div>";
    }
?>


<?php
include_once "footer.php";
?>