<?php

class ClienteController {

    private static $clienteService = null;

    private function __construct() {
    }

    public static function GET() {
        
        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
            require_once __DIR__ . '/../../domain/services/cliente.service.php';
            self::$clienteService = new ClienteService();
        }
        return json_encode(self::$clienteService->find_all_cliente());
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

}

?>