<?php   

//echo "Cliente Service";
require_once __DIR__ . '/../../infrastructure/persistence/conn_pdo_mysql.php';

/*
//Instanciar conexão 
try {        
    $cConnDB = new Database();
    $cConnDB->getConnection();
    echo "Conexão bem-sucedida!";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
    */


            

class ClienteService {

    public function find_all_cliente(): array {
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

};
    
//var_dump(new (ClienteService::class));
$obj = new ClienteService();
echo print_r($obj->find_all_cliente());


?>