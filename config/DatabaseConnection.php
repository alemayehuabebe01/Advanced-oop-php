<?php

class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("<h1>Database Connection Error</h1>");
        }
       
    }

    public function getConnection() {
        return $this->conn;
    }
}