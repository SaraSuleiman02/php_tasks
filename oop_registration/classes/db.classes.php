<?php
class DBConnection
{

    protected function connect()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=oop_login';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo; 
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}

// Checking if it connects to the db:
// $db = new DBConnection();
// $pdo = $db->connect();

// if ($pdo) {
//     echo "Connected successfully!";
// }