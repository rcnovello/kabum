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

    $router->map('GET', '/portal-admin', function() {
        verificarLogin(); 
        require __DIR__ . '/../views/portal-admin.php';
        
    });


    $router->map('GET', '/sobre', function() {
        require __DIR__ . '/../views/sobre.php';
        
    });



    $router->map('GET', '/api/cliente', function() {
        verificarLogin();
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::GET());
    });

    $router->map('GET', '/cliente', function() {
        verificarLogin(); 
        require __DIR__ . '/../views/portal-admin.php';
    });

    $router->map('POST', '/api/cliente', function() {
        verificarLogin();
        $dados = json_decode(file_get_contents('php://input'), true);  
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';   
        print_r(ClienteController::POST($dados));
    });

    $router->map('PUT', '/api/cliente', function() {
        verificarLogin();
        $dados = json_decode(file_get_contents('php://input'), true);  
        $cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';           
        print_r(ClienteController::PUT($dados));
    });

    $router->map('DELETE', '/api/cliente', function() {
        verificarLogin();
        $dados = json_decode(file_get_contents('php://input'), true);  
        $cClienteController = require_once __DIR__ . '/../app/presentation/controllers/cliente.controller.php';       
        $clienteController = new ClienteController();  
        $resultado = $clienteController->delete($dados['cd_cliente']);  
        header('Content-Type: application/json');
        echo json_encode(["success" => $resultado]);
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

?>


