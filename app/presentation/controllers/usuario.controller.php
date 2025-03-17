<?php

class UsuarioController {

    private static $usuarioService = null;

    private function __construct() {
    }

    public static function POST_LOGIN($usuario,$senha): int|array{
        
        if (self::$usuarioService === null) {
            require_once __DIR__ . '/../../domain/entities/usuario.entity.php';
            require_once __DIR__ . '/../../domain/services/usuario.service.php';
            self::$usuarioService = new UsuarioService();
        }

        
        $cUsuario = new Usuario(
            $usuario,
            $senha,            
        );
        

        try{
            $cRetLogin = self::$usuarioService->login_usuario($cUsuario);
            return self::$usuarioService->login_usuario($cUsuario);
        } catch (Exception $e) {            
            //return $e;
            return json_encode($e);
        }
        
    }

}

?>