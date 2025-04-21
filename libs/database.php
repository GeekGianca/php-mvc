<?php

class Database
{
    private mixed $host;
    private mixed $db;
    private mixed $dbUser;
    private mixed $password;
    private mixed $conn;
    private mixed $stmt;
    private mixed $error;

    public function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->db = constant('DB_DATABASE');
        $this->dbUser = constant('DB_USER');
        $this->password = constant('DB_PASSWORD');
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->conn = new PDO($dsn, $this->dbUser, $this->password, $options);
            $this->conn->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            trigger_error($e, E_USER_WARNING);
            echo $this->error;
        }
    }

    public function query($sql): void
    {
        $this->stmt = $this->conn->prepare($sql);
    }

    public function bind($params, $value, $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($params, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function records()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function record()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId(): false|string|int
    {
        return $this->conn->lastInsertId();
    }
}
