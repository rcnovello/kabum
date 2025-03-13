<?php

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case '/' :
            require __DIR__ . '/../views/home.php';
            break;
        case '/login' :
            require __DIR__ . '/../views/login.php';
            break;
        case '/cliente' :
            require __DIR__ . '/../views/cliente.php';
            break;    
        default:
            http_response_code(404);
            echo "Página não encontrada!";
            break;
    }          

?>


