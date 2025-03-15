<?php

    require __DIR__ . '/../vendor/autoload.php';
    
    $router = new AltoRouter();

    $router->map('GET', '/cliente', function() {
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::GET());
    });

    $router->map('POST', '/cliente', function() {
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::POST());
    });

    $router->map('PUT', '/cliente', function() {
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::PUT());
    });

    $match = $router->match();
    if ($match) {
        call_user_func($match['target']);
    } else {
        http_response_code(404);
        echo "Página não encontrada!";
    }


    /*
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
        case '/pdo' :
            require __DIR__ . '/../app/infrastructure/persistence/conn_pdo_mysql.php';
            break;   
        default:
            http_response_code(404);
            echo "Página não encontrada!";
            break;
    }
            */
    
    

?>


