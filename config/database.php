<?php

class Database
{
    /*private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        /*$this->host = constant('DB_HOST');
        $this->user = constant('DB_USER');
        $this->db = constant('DB_DATABASE');
        $this->password = constant('DB_PASSWORD');
        $this->charset = constant('CHARSET');
    }*/

    private $connection;

    public function connect()
    {
        require_once 'config.php';
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        return $this->connection;
    }

    /*function connect(){
        try{
            $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        }catch (PDOException $e){
            print_r('Error connection'-$e->getMessage());
        }
    }*/
}