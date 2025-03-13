<?php
class Cliente {
    private int $id;
    private string $nome;
    private string $email;
    private string $telefone;

    // Construtor
    public function __construct(int $id, string $nome, string $email, string $telefone) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    // Métodos GET
    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    // Métodos SET
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    // Método para exibir informações
    public function exibirCliente(): void {
        echo "Cliente: {$this->nome} | Email: {$this->email} | Telefone: {$this->telefone}\n";
    }
}

// Exemplo de uso
$cliente1 = new Cliente(1, "João Silva", "joao@email.com", "(11) 99999-9999");
$cliente1->exibirCliente();
?>
