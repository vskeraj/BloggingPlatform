<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "blog";  // Emri i databazës

    public $conn;

    public function __construct() {
        $this->connect();
    }

    // Metoda për të krijuar lidhjen me databazën
    private function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}


?>