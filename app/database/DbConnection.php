<?php
/**
* Usuario: Roger
 */

include("../database/MySQL.php");

/*
* Mysql database connection - only one connection alowed
*/
class DbConnection {
    // Hold the class instance.
    private static $instance = null;
    private $conn;
    protected $_config;

    private $DBhost;// = 'localhost';
    private $DBuser;// = 'root';
    private $DBpass;// = '1234567890';
    private $DBname;// = 'bookingSystem';

    // The db connection is established in the private constructor.
    private function __construct() {
        $this->getPDOConnection();
    }


    // Magic method clone is empty to prevent duplication of connection
    public function __clone() { }

    /*
     * Get an instance of the Database
     * @return Instance
     */
    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    /*
     * Get an database connection
     * @return conn
     */
    public function getConnection() {
        return $this->conn;
    }

    /*
     * Close an database connection
     * @return true
     */
    public function close() {
        $this->conn = null;
        return true;
    }

    public function getPDOConnection() {
        //get db config
        $this->_config = MySQL::getInstance()->getConfig();

        $this->DBhost = $this->_config["host"];
        $this->DBuser = $this->_config["username"];
        $this->DBpass = $this->_config["password"];
        $this->DBname = $this->_config["dbname"];

        // Check if the connection is already established
        try{

            $this->conn = new PDO(
                "mysql:host={$this->DBhost};dbname={$this->DBname}",
                $this->DBuser,
                $this->DBpass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
            );

            // Error handling
        }catch(PDOException $e){
            die("Failed to connect to DB: ". $e->getMessage());
        }
    }
}