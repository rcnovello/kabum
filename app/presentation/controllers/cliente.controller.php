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
            $dados['nm_cliente'] ?? '',
            $dados['dt_nasc'] ?? '',
            $dados['nr_cpf'] ?? '',
            $dados['nr_rg'] ?? '',
            $dados['nr_telefone'] ?? '',
        );
        
        return json_encode(self::$clienteService->create_cliente($cliente));
    }

    public static function PUT($dados) {

        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
            require_once __DIR__ . '/../../domain/services/cliente.service.php';            
            self::$clienteService = new ClienteService();
        }

        $cliente = new Cliente(
            $dados['nm_cliente'],
            $dados['dt_nasc'],
            $dados['nr_cpf'],
            $dados['nr_rg'],
            $dados['nr_telefone'],
            $dados['cd_cliente'],
        );
        
        return json_encode(self::$clienteService->update_cliente($cliente));
    }

    public static function DELETE($dados) {

        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
            require_once __DIR__ . '/../../domain/services/cliente.service.php';            
            self::$clienteService = new ClienteService();
        }

        $cliente = new Cliente(
            $dados['nm_cliente'],
            $dados['dt_nasc'],
            $dados['nr_cpf'],
            $dados['nr_rg'],
            $dados['nr_telefone'],
            $dados['cd_cliente']
        );
        
        return json_encode(self::$clienteService->delete_cliente($cliente));
    }

}

?>