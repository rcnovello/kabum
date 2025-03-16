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
            "40591386810",
            "123"
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

        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
            require_once __DIR__ . '/../../domain/services/cliente.service.php';            
            self::$clienteService = new ClienteService();
        }

        $cliente = new Cliente(
            "TESTES DE TEST",
            "1991-11-12 00:00:00",
            "40591386111",
            "47948664111",
            "19996228551"
        );
        
        return json_encode(self::$clienteService->create_cliente($cliente));
    }

    public static function PUT() {

        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
            require_once __DIR__ . '/../../domain/services/cliente.service.php';            
            self::$clienteService = new ClienteService();
        }


        /*
        $cliente = new Cliente(
            [
                'cd_cliente'    => 1,
                'nm_cliente'    => 'Teste Atualizado',
                'dt_nasc'       => '1992-01-01',
                'nr_cpf'        => '12345678900',
                'nr_rg'         => '123456789',
                'nr_telefone'   => '11987654321'
            ]
        );
        */

        $cliente = new Cliente(
            "TESTES DE TEST 2",
            "1991-11-12 00:00:00",
            "40591386111",
            "47948664111",
            "19996228551",
            1
        );
        
        return json_encode(self::$clienteService->update_cliente($cliente));
    }

    public static function DELETE() {

        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
            require_once __DIR__ . '/../../domain/services/cliente.service.php';            
            self::$clienteService = new ClienteService();
        }


        /*
        $cliente = new Cliente(
            [
                'cd_cliente'    => 1,
                'nm_cliente'    => 'Teste Atualizado',
                'dt_nasc'       => '1992-01-01',
                'nr_cpf'        => '12345678900',
                'nr_rg'         => '123456789',
                'nr_telefone'   => '11987654321'
            ]
        );
        */

        $cliente = new Cliente(
            "TESTES DE TEST 2",
            "1991-11-12 00:00:00",
            "40591386111",
            "47948664111",
            "19996228551",
            7
        );
        
        return json_encode(self::$clienteService->delete_cliente($cliente));
    }

}

?>