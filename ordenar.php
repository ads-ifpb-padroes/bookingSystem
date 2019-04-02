<?php
// include database and object files
include_once 'classes/database.php';
include_once 'classes/atracao.php';
include_once 'classes/category.php';
include_once 'initial.php';


// instantiate database and user object

$atracao = new atracao($db);

$category = new Category($db);

// include header file
$page_title = "bookingSystem";
include_once "header.php";



// check if more than 0 record found
    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Localização</th>";
    
    echo "<th>Data</th>";

    echo "<th>Ingresso</th>";

    echo "<th>Duração</th>";
    echo "</tr>";
    include_once 'classes/ordenar.php';
    echo "</table>";


?>