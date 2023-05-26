<?php

class Database
{
    private $host;
    private $db_name;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db_name = constant('DB_NAME');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    public function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Connection error' . $e->getMessage());
        }
    }
}
