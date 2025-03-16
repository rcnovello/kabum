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
            $arr = array('success' => true, 'message' => 'Dados do cliente recuperados ocm sucesso.', 'data' => $cliente, 'errors' => '{}');  
            return $arr;
        } catch (Exception $e) {
            $arr = array('success' => false, 'message' => 'Erro ao recuperar dados do cliente.', 'data' => '{}', 'errors' => $e->getMessage());
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
            $arr = array('success' => true, 'message' => 'Registro salvo com sucesso.', 'data' => $lastId, 'errors' => '{}');     
            //$retJson = '{"success":true,"data":$lastId,"errors":{}}';
            return $arr ;
        } catch (PDOException $e) {
            $arr = array('success' => false, 'message' => 'Atenção, erro ao salvar.', 'data' => '{}', 'errors' => $e->getMessage());
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
                        nr_telefone = :nr_telefone,
                        nr_cpf = :nr_cpf,                        
                        nr_rg = :nr_rg
                    WHERE cd_cliente = :cd_cliente";

            $stmt = $pdo->prepare($sql); 

            $stmt->bindValue(':nm_cliente', $cliente->getNmCliente());
            $stmt->bindValue(':dt_nasc', $cliente->getDtNasc());
            $stmt->bindValue(':nr_cpf', $cliente->getNrCpf());
            $stmt->bindValue(':nr_rg', $cliente->getNrRg());
            $stmt->bindValue(':nr_telefone', $cliente->getNrTelefone());
            $stmt->bindValue(':cd_cliente', $cliente->getCdCliente());
            

            $stmt->execute();     

            $arr = array('success' => true, 'message' => 'Registro atualizado com sucesso.', 'data' => $stmt, 'errors' => '{}');     
            //$retJson = '{"success":true,"data":$lastId,"errors":{}}';
            return $arr;
        } catch (PDOException $e) {
            $arr = array('success' => false, 'message' => 'Atenção, registro não foi atualizado devido a um erro.', 'data' => '{}', 'errors' => $e->getMessage());
            //$json = '{"a":$e,"b":2,"c":3,"d":4,"e":5}';
            return $arr;
        }
    }

    public function delete_cliente(Cliente $cliente): array {
        try {        
            $pdo = Database::getConnection();
            $sql = "DELETE FROM cliente WHERE cd_cliente = :cd_cliente";

            $stmt = $pdo->prepare($sql); 

            $stmt->bindValue(':cd_cliente', $cliente->getCdCliente());
            
            $stmt->execute();     

            $arr = array('success' => true, 'message' => 'Registro excluído com sucesso.','data' => $stmt, 'errors' => '{}');     
            return $arr;
        } catch (PDOException $e) {
            $arr = array('success' => false, 'message' => 'Atenção, erro ao excluir.', 'data' => '{}', 'errors' => $e->getMessage());
            return $arr;
        }
    }

};
    

?>