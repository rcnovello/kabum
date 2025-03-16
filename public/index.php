<?php

    require __DIR__ . '/../vendor/autoload.php';
    
    $router = new AltoRouter();

    // Função para verificar login
    function verificarLogin() {
        session_start();
        if (!isset($_SESSION["usuario_logado"])) {
            header("Location: /login");
            exit;
        }
    }


    $router->map('POST', '/login', function() {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        $usuario = $dados['cd_login'] ?? '';
        $senha = $dados['ds_Senha'] ?? '';

        $cUsuarioController = require __DIR__ . '/../app/presentation/controllers/usuario.controller.php';   
        $cLogin = UsuarioController::POST_LOGIN();

        session_start();
        if ($cLogin === true) { 
            $_SESSION['usuario_logado'] = $usuario;
            //echo json_encode(["message" => "Login bem-sucedido!"]);
            header("Location: /home"); // Redireciona para a área logada
        } else if($cLogin === false){
            http_response_code(401);
            echo json_encode(["error" => "Credenciais inválidas!"]);
        } else {
            http_response_code(400);
            print_r($cLogin);
        }

    });

    // Rota de logout
    $router->map('GET', '/login', function() {       
        session_start();
        if (!isset($_SESSION["usuario_logado"])) {
            require __DIR__ . '/../views/login.php';
        }else{
            header("Location: /home");
        }  
        
    });

    // Rota de logout
    $router->map('GET', '/', function() {        
        require __DIR__ . '/../views/home.php';
    });

    $router->map('GET', '/home', function() {       
        //verificarLogin(); 
        require __DIR__ . '/../views/home.php';
    });


    // Rota de logout
    $router->map('GET', '/logout', function() {
        session_start();
        session_destroy();
        header("Location: /home");
    });

    $router->map('GET', '/cliente', function() {
        verificarLogin();
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::GET());
    });

    $router->map('POST', '/cliente', function() {
        verificarLogin();
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::POST());
    });

    $router->map('PUT', '/cliente', function() {
        verificarLogin();
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::PUT());
    });

    $router->map('DELETE', '/cliente', function() {
        verificarLogin();
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::DELETE());
    });

    $match = $router->match();
    if ($match) {
        call_user_func($match['target']);
    } else {
        http_response_code(404);
        //echo "Página não encontrada!";
        $arr = array('success' => false, 'message' => 'Página não encontrada!', 'data' => '{}', 'errors' => "500");
        print_r(json_encode($arr));
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


