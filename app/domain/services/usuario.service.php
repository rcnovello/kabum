<?php   

require_once __DIR__ . '/../../infrastructure/persistence/conn_pdo_mysql.php';
require_once __DIR__ . '/../../domain/entities/usuario.entity.php';
           
class UsuarioService {

    public function login_usuario(Usuario $usuario): int|array{
        try {        
            $pdo = Database::getConnection();  
            $sql = 'SELECT cd_usuario, cd_login, ds_senha FROM usuario where cd_login = :cd_login and ds_senha = :ds_senha';
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':cd_login', $usuario->getCdLogin());
            $stmt->bindValue(':ds_senha', $usuario->getDsSenha());

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return 1;
            } else {
                return 0;
            };
        } catch (Exception $e) {
            $arr = array('success' => false, 'message' => 'Erro ao fazer login', 'data' => '{}', 'errors' => $e->getMessage());
            return $arr;
        }
    }


};
    

?>