<?php
/**
 * Created by rodger on 3/17/2019 9:33 PM
 */

class DbFactory {
    protected $database = null;

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function newConnection() {
        $this->database->connect();
//        if ($this->driver === 'mysql') {
//            $DataBase = new MySQL();
//        }
//        elseif ($this->driver === 'postgre') {
//            $DataBase = new PostgreSQL();
//        }
//        $DataBase->connect();
        return $this->database;
    }

    public function makeConnection($host, $user, $pass, $dbname) {
//        if ($this->driver === 'mysql') {
//            $DataBase = new MySQL();
//        }
//        elseif ($this->driver === 'postgre') {
//            $DataBase = new PostgreSQL();
//        }
        $this->database->connect();

        $this->database->setHost($host);
        $this->database->setDdbname($dbname);
        $this->database->setUser($user);
        $this->database->setPass($pass);
        $this->database->connect();

        return $this->database;
    }

    public function close() {
        $this->database->close();
    }
}