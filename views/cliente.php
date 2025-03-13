<?php


    echo "Cliente </ br> </br>"; 

    //$cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';

    
    $dsn = "mysql:host=db:3306;dbname=kabum;charset=utf8mb4";
    $user = "root";
    $pass = "root";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        echo "Conectado";
    } catch (PDOException $e) {
        die("Erro ao conectar: " . $e->getMessage());
    }

    echo "<br>fim"; 
    

?>