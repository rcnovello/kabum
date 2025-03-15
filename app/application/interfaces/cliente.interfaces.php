<?php
require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
interface ClienteInterface {
    //public function create(Cliente $cliente): bool;
}

/*
interface ClienteServiceInterface {
    public function salvar(Cliente $cliente): bool;
}

class ClienteService implements ClienteServiceInterface {
    public function salvar(Cliente $cliente): bool {
        // Simulando inserção no banco de dados
        echo "Salvando cliente: " . $cliente->getNome() . PHP_EOL;
        return true;
    }
}
    */

?>