<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class ClienteControllerTest extends TestCase
{
    private Client $client;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost',
            'http_errors' => false, // Evita exceções em erros HTTP
        ]);
    }

    public function testDeletarCliente()
    {
        // Criar um cliente de teste primeiro (POST)
        $response = $this->client->post('/api/cliente', [
            'json' => [
                'nm_cliente' => 'Teste Cliente',
                'dt_nasc' => '1990-01-01',
                'nr_cpf' => '12345678901',
                'nr_rg' => '987654321',
                'nr_telefone' => '11999999999'
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('cd_cliente', $data);

        $cdCliente = $data['cd_cliente'];

        // Agora testamos a exclusão do cliente
        $deleteResponse = $this->client->delete('/api/cliente', [
            'json' => ['cd_cliente' => $cdCliente]
        ]);

        $this->assertEquals(200, $deleteResponse->getStatusCode());

        $deleteData = json_decode($deleteResponse->getBody(), true);
        $this->assertTrue($deleteData['success']);

        // Testa se o cliente foi realmente deletado (GET deve falhar)
        $getResponse = $this->client->get("/api/cliente/$cdCliente");
        $this->assertEquals(404, $getResponse->getStatusCode());
    }
}
