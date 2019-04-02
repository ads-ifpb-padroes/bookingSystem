<?php

class DatabaseConnection
{
    private $configuration;

    public function __construct(DatabaseConfiguration $config) {
        $this->configuration = $config;
    }

    public function getDsn(){

        $user = $this->configuration->getUsername();
        $pass = $this->configuration->getPassword();
        $host = $this->configuration->getHost();
        $port = $this->configuration->getPort();
        $database = $this->configuration->getDatabase();

        // return sprintf(
        //                '%s:%s@%s:%d',
        //                $this->configuration->getUsername(),
        //                $this->configuration->getPassword(),
        //                $this->configuration->getHost(),
        //                $this->configuration->getPort()
        //            );

        try {
            $dbh = new PDO(
                "mysql:host={$host};dbname={$database}",
                $user,
                $pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $exception) {
            echo "Database Connection Error: " . $exception->getMessage();
        }
       

        return $dbh;
    }
}

