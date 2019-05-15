<?php
class DB {
    // private $host = 'localhost';
    // private $dbName = 'book_store';
    // private $user = 'root';
    // private $pass = 'root';
    // private $charset = 'utf8mb4';
    // public $pdo;    

    private $host = 'my63b.sqlserver.se';
    private $dbName = '236975-bookstore';
    private $user = '236975_ny96660';
    private $pass = 'hejhej123';
    private $charset = 'utf8mb4';
    public $pdo;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=$this->charset";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (\PDOexception $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}