<?php

    require __DIR__ . '/../vendor/autoload.php';
    
    $router = new AltoRouter();
    $router->map('POST', '/login', function() {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        $usuario = $dados['cd_login'] ?? '';
        $senha = $dados['ds_Senha'] ?? '';

        $cUsuarioController = require __DIR__ . '/../app/presentation/controllers/usuario.controller.php';   
        $cLogin = UsuarioController::POST_LOGIN();

        if ($cLogin === true) { 
            $_SESSION['usuario_logado'] = $usuario;
            echo json_encode(["message" => "Login bem-sucedido!"]);
        } else if($cLogin === false){
            http_response_code(401);
            echo json_encode(["error" => "Credenciais inválidas!"]);
        } else {
            http_response_code(400);
            print_r($cLogin);
        }


        /*
        if ($usuario === 'admin' && $senha === '1234') { 
            $_SESSION['usuario_logado'] = $usuario;
            echo json_encode(["message" => "Login bem-sucedido!"]);
        } else {
            http_response_code(401);
            echo json_encode(["error" => "Credenciais inválidas!"]);
        }
        */
    });

    // Rota de logout
    $router->map('POST', '/logout', function() {
        session_destroy();
        echo json_encode(["message" => "Logout realizado com sucesso!"]);
    });

    // Função para verificar login
    function verificarLogin() {
        if (!isset($_SESSION['usuario_logado'])) {
            http_response_code(401); // Não autorizado
            echo json_encode(["error" => "Acesso não autorizado. Faça login."]);
            exit;
        }
    }

    $router->map('GET', '/cliente', function() {
        verificarLogin();
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

    $router->map('DELETE', '/cliente', function() {
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::DELETE());
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


