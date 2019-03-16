<?php
/**
 * Created by IntelliJ IDEA.
 * Usuario: Roger
 * Date: 3/10/2019
 * Time: 2:09 AM
 */

class MySQL {
    private $config;
    private static $instance;

    // Db info
    private $driver = "mysql";
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '1234567890';
    private $database = 'bookingSystem';

    public function __construct() { }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new MySQL();
        }

        return self::$instance;
    }

    protected function getDriver() {
        return $this->driver;
    }

    public function setDriver($driver) {
        $this->driver = $driver;
    }

    protected function getServername() {
        return $this->servername;
    }

    public function setServername($servername) {
        $this->servername = $servername;
    }

    protected function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    protected function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    protected function getDatabase() {
        return $this->database;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function getConfig() {
        return $this->config = array(
            'driver' => MySQL::getInstance()->getDriver(),
            'host' => MySQL::getInstance()->getServername(),
            'dbname' => MySQL::getInstance()->getDatabase(),
            'username' => MySQL::getInstance()->getUsername(),
            'password' => MySQL::getInstance()->getPassword());
    }


}