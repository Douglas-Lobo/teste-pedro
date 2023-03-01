<?php

namespace App\Config;

use PDO;
use PDOException;

class Database {

    protected $host = "mysql";
    protected $db_name = "estudos";
    protected $username = "root";
    protected $password = "root";
    protected $conn;

    public function getConnection() {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
