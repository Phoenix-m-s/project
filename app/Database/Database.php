<?php
// Database.php

namespace App\Database; // مطمئن شوید که در فضای نام صحیح هستید

class Database {
    private $config;

    public function __construct() {
        $this->config = include('../config/database.php');
    }

    public function connect() {
        $host = $this->config['host'];
        $username = $this->config['username'];
        $password = $this->config['password'];
        $database = $this->config['database'];

        try {
            $connection = new \PDO("mysql:host=$host;dbname=$database", $username, $password);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            // مدیریت خطاها
            echo 'Connection failed: ' . $e->getMessage();
            return null;
        }
    }
}
