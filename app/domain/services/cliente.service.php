<?php   

//echo "Cliente Service";
require_once __DIR__ . '/../../infrastructure/persistence/conn_pdo_mysql.php';
require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
require_once __DIR__ . '/../../application/interfaces/cliente.interfaces.php';
           
class ClienteService {

    public function find_all_cliente(): array {
        echo "teste GET";
        try {        
            $pdo = Database::getConnection();
            //echo "Conexão bem-sucedida!";     
            $sql = 'SELECT * FROM cliente';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            //$cliente = $stmt->fetch();
            $cliente = $stmt->fetchAll();
            return $cliente;
        } catch (Exception $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    public function create_cliente(Cliente $cliente): string {
        echo "teste POST";

        /*
        $cliente = new Cliente(
            "TESTES DE TEST",
            "1991-11-12 00:00:00",
            "40591386100",
            "47948664100",
            "19996228551"
        );
        */


        try {        
            $pdo = Database::getConnection();
            //echo "Conexão bem-sucedida!";     
            /*
            $pdo->query("INSERT INTO `kabum`.`cliente`
                (`nm_cliente`,
                `dt_nasc`,
                `nr_cpf`,
                `nr_rg`,
                `nr_telefone`)
                VALUES
                (
                'TESTES DE TEST',
                '1991-11-12',
                '405913861X',
                '479486641X',
                '19996228551')");
                */
            
            /*
            $sql = "INSERT INTO cliente (nm_cliente, dt_nasc, nr_cpf, nr_rg, nr_telefone) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $pdo->query($sql, [
                $cliente->getNmCliente(),
                $cliente->getDtNasc(),
                $cliente->getNrCpf(),
                $cliente->getNrRg(),
                $cliente->getNrTelefone()
            ]);
            */
            


            /*
            $pdo->query("INSERT INTO clientes (nome, email) VALUES (?, ?)", [
                'João Silva',
                'joao@email.com'
            ]);
            */

            $sql = "INSERT INTO cliente (nm_cliente, dt_nasc, nr_cpf, nr_rg, nr_telefone) 
                    VALUES (:nm_cliente, :dt_nasc, :nr_cpf, :nr_rg, :nr_telefone)";

            $stmt = $pdo->prepare($sql); // Prepara a consulta
            
            // Bind dos parâmetros
            $stmt->bindValue(':nm_cliente', $cliente->getNmCliente());
            $stmt->bindValue(':dt_nasc', $cliente->getDtNasc());
            $stmt->bindValue(':nr_cpf', $cliente->getNrCpf());
            $stmt->bindValue(':nr_rg', $cliente->getNrRg());
            $stmt->bindValue(':nr_telefone', $cliente->getNrTelefone());

            // Executa a query
            $stmt->execute();
            

            echo "Cliente cadastrado com sucesso!";
            $lastId = $pdo->lastInsertId();
            //echo "Cliente inserido com ID: $lastId";
            return "Cliente inserido com ID: $lastId";
        } catch (PDOException $e) {
            return "Erro: " . $e->getMessage();
        }


    }

};
    
//var_dump(new (ClienteService::class));
//$obj = new ClienteService();
//echo print_r($obj->find_all_cliente());

//echo print_r($obj->create_cliente());


?>