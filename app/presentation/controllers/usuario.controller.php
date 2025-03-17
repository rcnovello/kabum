<?php

class UsuarioController {

    private static $usuarioService = null;

    private function __construct() {
    }

    public static function POST_LOGIN(): bool|array{
        
        if (self::$usuarioService === null) {
            require_once __DIR__ . '/../../domain/entities/usuario.entity.php';
            require_once __DIR__ . '/../../domain/services/usuario.service.php';
            self::$usuarioService = new UsuarioService();
        }

        $cUsuario = new Usuario(

        );

        try{
            $cRetLogin = self::$usuarioService->login_usuario($cUsuario);
            return self::$usuarioService->login_usuario($cUsuario);
        } catch (Exception $e) {            
            //return $e;
            return json_encode($e);
        }
        
    }

    public static function GET() {
        
        if (self::$usuarioService === null) {
            require_once __DIR__ . '/../../domain/entities/usuario.entity.php';
            require_once __DIR__ . '/../../domain/services/usuario.service.php';
            self::$usuarioService = new UsuarioService();
        }
        return json_encode(self::$usuarioService->login_usuario());
    }

    public static function POST() {

        if (self::$UsuarioService === null) {
            require_once __DIR__ . '/../../domain/entities/Usuario.entity.php';
            require_once __DIR__ . '/../../domain/services/Usuario.service.php';            
            self::$UsuarioService = new UsuarioService();
        }

        $Usuario = new Usuario(
        );
        
        return json_encode(self::$UsuarioService->create_Usuario($Usuario));
    }

    public static function PUT() {

        if (self::$UsuarioService === null) {
            require_once __DIR__ . '/../../domain/entities/Usuario.entity.php';
            require_once __DIR__ . '/../../domain/services/Usuario.service.php';            
            self::$UsuarioService = new UsuarioService();
        }

        
        return json_encode(self::$UsuarioService->update_Usuario($Usuario));
    }

    public static function DELETE() {

        if (self::$UsuarioService === null) {
            require_once __DIR__ . '/../../domain/entities/Usuario.entity.php';
            require_once __DIR__ . '/../../domain/services/Usuario.service.php';            
            self::$UsuarioService = new UsuarioService();
        }
        
        return json_encode(self::$UsuarioService->delete_Usuario($Usuario));
    }

}

?>