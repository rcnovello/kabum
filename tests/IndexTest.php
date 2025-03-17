<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    private $baseUrl = "http://localhost"; // Ajuste conforme o ambiente

    public function testHomePage()
    {
        $response = file_get_contents($this->baseUrl . "/");
        $this->assertStringContainsString("home", $response);
    }

    public function testLoginPage()
    {
        $response = file_get_contents($this->baseUrl . "/login");
        $this->assertStringContainsString("login", $response);
    }

    public function testLoginAPI()
    {
        $data = json_encode([
            "cd_login" => "admin",
            "ds_Senha" => "123456"
        ]);

        $options = [
            "http" => [
                "method"  => "POST",
                "header"  => "Content-Type: application/json",
                "content" => $data
            ]
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($this->baseUrl . "/login", false, $context);
        $this->assertStringContainsString("<h1>Bem-vindo ao meu teste para a Kabum</h1>", $response);
    }

    public function testApiClientes()
    {
        $response = file_get_contents($this->baseUrl . "/api/cliente");
        $this->assertJson($response);
    }

    public function testPaginaNaoEncontrada()
    {
        $response = file_get_contents($this->baseUrl . "/rota-inexistente");
        $this->assertStringContainsString("Página não encontrada", $response);
    }
}
?>
