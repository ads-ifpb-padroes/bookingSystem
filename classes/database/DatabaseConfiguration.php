<?php

class DatabaseConfiguration 
{

    private $host;
    private $port;
    private $username;
    private $password;
    private $database;

    public function __construct(string $host, int $port, string $username, 
                                string $password, string $database) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function getHost(): string {
        return $this->host;
    }

    public function getPort(): int {
        return $this->port;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getDatabase(): string  {
        return $this->database;
    }
}