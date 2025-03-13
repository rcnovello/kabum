<?php

    echo "Conn PDO"; 


    #$dsn = "mysql:host=localhost:8889;dbname=kabum;charset=utf8mb4";
    $dsn = "mysql:host=db:3306;dbname=kabum;charset=utf8mb4";
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





?>