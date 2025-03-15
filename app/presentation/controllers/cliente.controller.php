<?php
//$cClienteService = require __DIR__ . '/../../domain/services/cliente.service.php';

//echo "Cliente Controllers";

class ControllerService {
    private static $clienteService = null;

    private function __construct() {} // Impede instanciação direta

    public static function GET() {
        if (self::$clienteService === null) {
            require_once __DIR__ . '/../../domain/services/cliente.service.php';
            self::$clienteService = new ClienteService();
        }
        return self::$clienteService;
    }
}

//$cliente = ControllerService::GET();


?>