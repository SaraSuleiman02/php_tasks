<?php
class DBConnection
{

    public function connect()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=oop_login';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo; // Return the PDO instance
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}

// Usage example:
$db = new DBConnection();
$pdo = $db->connect();

if ($pdo) {
    echo "Connected successfully!";
}