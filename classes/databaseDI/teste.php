<?php
include 'DatabaseConfiguration.php';
include 'DatabaseConnection.php';


$config = new DatabaseConfiguration('localhost', 3306, 'root', '', 'rodger');
$conn = new DatabaseConnection($config);

var_dump($conn);
