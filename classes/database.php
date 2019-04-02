<?php
include 'database/DatabaseConfiguration.php';
include 'database/DatabaseConnection.php';

class Database
{

    // used to connect to the database
    // private $host = "localhost";
    // private $db_name = "rodger";
    // private $username = "root";
    // private $password = "";
    public $db_conn;

    // public function __construct() {
    //     $config = new DatabaseConfiguration('localhost', 3306, 'root', '', 'rodger');
    //     $conn = new DatabaseConnection($config);
    //     $this->db_conn = $conn->getDsn();;
    // }

    
    // // get the database connection
    public function getConnection()
    {
        $this->db_conn = null;

        $config = new DatabaseConfiguration('localhost', 3306, 'root', '', 'rodger');
        $conn = new DatabaseConnection($config);
        return $this->db_conn = $conn->getDsn();

        // try {
        //     $this->db_conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        // } catch (PDOException $exception) {
        //     echo "Database Connection Error: " . $exception->getMessage();
        // }
        // return $this->db_conn;
    }
}

