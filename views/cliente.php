<?php
$cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';    

echo "Cliente </ br> </br>"; 

echo "Rota GET Clientes: <p>";
$cliente = ControllerService::GET();



echo "<br>fim"; 
    

?>