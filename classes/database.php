<?php
include 'databaseDI/DatabaseConfiguration.php';
include 'databaseDI/DatabaseConnection.php';

class Database
{

    public $db_conn;

    public function getConnection()
    {
        $this->db_conn = null;

        $config = new DatabaseConfiguration('localhost', 3306, 'root', '', 'rodger');
        $conn = new DatabaseConnection($config);
        return $this->db_conn = $conn->getDsn();
    }
}

