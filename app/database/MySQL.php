<?php
/**
 * Created by rodger on 3/10/2019 2:09 AM
 */
include("../interface/Database.php");

class MySQL implements Database{
    private $conn = null;

    // Db info
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'dp_bookingSystem';

    public function __construct() { }

    /**
     * @return connection se obter conexão com banco, caso contrário null
     */
    public function getConn() {
        return $this->conn;
    }

    function getHost() {
        // TODO: Implement getServername() method.
        return $this->host;
    }

    function setHost($host) {
        // TODO: Implement setServername() method.
        $this->host = $host;
    }

    function getUser() {
        // TODO: Implement getUsername() method.
        return $this->user;
    }

    function setUser($user) {
        // TODO: Implement setUsername() method.
        $this->user = $user;
    }

    function getPass() {
        // TODO: Implement getPassword() method.
        return $this->pass;
    }

    function setPass($pass) {
        // TODO: Implement setPassword() method.
        $this->pass = $pass;
    }

    function getDdbname() {
        // TODO: Implement getDatabase() method.
        return $this->dbname;
    }

    function setDdbname($dbname) {
        // TODO: Implement setDatabase() method.
        $this->dbname = $dbname;
    }

    function connect() {
        // Check if the connection is already established
        try{

            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
            );

            // Error handling
        }catch(PDOException $e){
            die("Failed to connect to DB MySQL: ". $e->getMessage());
        }
    }

    function close() {
        $this->conn = null;
    }
}