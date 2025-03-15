<?php
require_once __DIR__ . '/../../domain/entities/cliente.entity.php';

class ControllerService {
    private static $clienteService = null;

    private function __construct() {} // Impede instanciação direta

    public static function GET() {
        
        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/services/cliente.service.php';
            self::$clienteService = new ClienteService();
        }
        return self::$clienteService->find_all_cliente();
    }

    public static function POST() {
        
        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/services/cliente.service.php';            
            self::$clienteService = new ClienteService();
        }
        //return self::$clienteService;        
        $cliente = new Cliente(
            "TESTES DE TEST",
            "1991-11-12 00:00:00",
            "40591386102",
            "47948664102",
            "19996228551"
        );
        
        return self::$clienteService->create_cliente($cliente);
    }
}

//$cliente = ControllerService::GET();


?>