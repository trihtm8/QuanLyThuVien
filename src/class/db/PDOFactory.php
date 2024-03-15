<?php

namespace CT275_project\db;

use PDO;
use PDOException;

use CT275_project\tool\Err_helper;

class PDOFactory{
    private ?PDO $conn;
    public bool $notError;
    public function __construct(){
        $this->conn = null;
        $this->notError = true;
    }
    public function connect(): PDOFactory | Err_helper
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=ct275_project", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this;
        } catch (PDOException $e) {
            $Err = new Err_helper('PDOFactory',$e->getMessage());
            return $Err;
        }  
    }

    public function disconnect() : null
    {
        $this->conn = null;
        return null;
    }

    public function conector(): ?PDO
    {
        return $this->conn;
    }
}