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
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
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
