<?php
$cClienteController = require __DIR__ . '/../app/presentation/controllers/cliente.controller.php';    

echo "Cliente </ br> </br>"; 

echo "<p>Rota GET Clientes: </br>";
//$cliente = ControllerService::GET();
print_r(ControllerService::GET());

echo "<p>Rota POST Clientes: <p></br>";
//$cliente = ControllerService::POST();
print_r(ControllerService::POST());



echo "<br>fim"; 
    

?>