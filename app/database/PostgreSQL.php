<?php
/**
 * Created by rodger on 3/17/2019 9:20 PM
 */

class PostgreSQL implements Database {
    private $conn = null;

    // Db info
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '1234567890';
    private $dbname = 'bookingSystem';

    public function __construct() { }

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
        // TODO: Implement connect() method.
        echo "Connected with PostgreSQL\n";
    }

    function close() {
        $this->conn = null;
    }
}