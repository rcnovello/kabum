<?php

require __DIR__ . '/../../../vendor/autoload.php';
//echo "Autoload funcionando!";

use Dotenv\Dotenv;

/*
    //require_once 'Database.php';

    try {
        $pdo = Database::getConnection();
        echo "Conexão bem-sucedida!";
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
        */

class Database {
    private static $pdo = null;

    private function __construct() {
        // Evita instanciação externa
    }
    

    public static function getConnection() {
        if (self::$pdo === null) {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $dbname = $_ENV['DB_NAME'] ?? 'test';
            $user = $_ENV['DB_USER'] ?? 'root';
            $password = $_ENV['DB_PASSWORD'] ?? '';
            $port = $_ENV['DB_PORT'] ?? '3306';

            try {
                $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
                self::$pdo = new PDO($dsn, $user, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }

}


/*
    echo "Conn PDO"; 


    $dsn = "mysql:host=localhost:8889;dbname=kabum;charset=utf8mb4";
    //$dsn = "mysql:host=db:3306;dbname=kabum;charset=utf8mb4";
    $user = "root";
    $pass = "root";

    try {
        $pdo = new PDO('localhost:3306', $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        echo "Conectado";
    } catch (PDOException $e) {
        echo $e->getMessage();
        die("Erro ao conectar: " . $e->getMessage());
    }

    echo "<br>fim"; 
*/




?>