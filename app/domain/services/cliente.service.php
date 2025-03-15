<?php   


require_once __DIR__ . '/../../infrastructure/persistence/conn_pdo_mysql.php';
require_once __DIR__ . '/../../domain/entities/cliente.entity.php';
//require_once __DIR__ . '/../../application/interfaces/cliente.interfaces.php';
           
class ClienteService {

    public function find_all_cliente(): array {
        try {        
            $pdo = Database::getConnection();  
            $sql = 'SELECT * FROM cliente';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $cliente = $stmt->fetchAll();
            $arr = array('success' => true, 'data' => $cliente, 'errors' => '{}');  
            return $arr;
        } catch (Exception $e) {
            $arr = array('success' => false, 'data' => '{}', 'errors' => $e->getMessage());
            return $arr;
        }
    }

    public function create_cliente(Cliente $cliente): array {
        try {        
            $pdo = Database::getConnection();
            $sql = "INSERT INTO cliente (nm_cliente, dt_nasc, nr_cpf, nr_rg, nr_telefone) 
                    VALUES (:nm_cliente, :dt_nasc, :nr_cpf, :nr_rg, :nr_telefone)";
            $stmt = $pdo->prepare($sql); 
            
            $stmt->bindValue(':nm_cliente', $cliente->getNmCliente());
            $stmt->bindValue(':dt_nasc', $cliente->getDtNasc());
            $stmt->bindValue(':nr_cpf', $cliente->getNrCpf());
            $stmt->bindValue(':nr_rg', $cliente->getNrRg());
            $stmt->bindValue(':nr_telefone', $cliente->getNrTelefone());

            $stmt->execute();
            //return $stmt;
            
            $lastId = $pdo->lastInsertId();       
            $arr = array('success' => true, 'data' => $lastId, 'errors' => '{}');     
            //$retJson = '{"success":true,"data":$lastId,"errors":{}}';
            return $arr ;
        } catch (PDOException $e) {
            $arr = array('success' => false, 'data' => '{}', 'errors' => $e->getMessage());
            //$json = '{"a":$e,"b":2,"c":3,"d":4,"e":5}';
            return $arr;
        }
    }

    public function update_cliente(Cliente $cliente): array {
        try {        
            $pdo = Database::getConnection();
            $sql = "UPDATE cliente 
                    SET nm_cliente = :nm_cliente, 
                        dt_nasc = :dt_nasc,                        
                        nr_telefone = :nr_telefone 
                    WHERE cd_cliente = :cd_cliente";

            $stmt = $pdo->prepare($sql); 

            $stmt->bindValue(':nm_cliente', $cliente->getNmCliente());
            $stmt->bindValue(':dt_nasc', $cliente->getDtNasc());
            //$stmt->bindValue(':nr_cpf', $cliente->getNrCpf());
            //$stmt->bindValue(':nr_rg', $cliente->getNrRg());
            $stmt->bindValue(':nr_telefone', $cliente->getNrTelefone());
            $stmt->bindValue(':cd_cliente', $cliente->getCdCliente());
            
            /*
            $stmt->bindParam(':nm_cliente', $cliente['nm_cliente']);
            $stmt->bindParam(':dt_nasc', $cliente['dt_nasc']);
            $stmt->bindParam(':nr_cpf', $cliente['nr_cpf']);
            $stmt->bindParam(':nr_rg', $cliente['nr_rg']);
            $stmt->bindParam(':nr_telefone', $cliente['nr_telefone']);
            $stmt->bindParam(':cd_cliente', $cliente['cd_cliente']);
            */

            $stmt->execute();     

            $arr = array('success' => true, 'data' => $stmt, 'errors' => '{}');     
            //$retJson = '{"success":true,"data":$lastId,"errors":{}}';
            return $arr;
        } catch (PDOException $e) {
            $arr = array('success' => false, 'data' => '{}', 'errors' => $e->getMessage());
            //$json = '{"a":$e,"b":2,"c":3,"d":4,"e":5}';
            return $arr;
        }
    }

};
    

?>