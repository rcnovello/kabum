<?php
    //echo json_encode(["Home Page" => "Olá do PHP!", "data" => date("d/m/Y H:i:s")]);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Kabum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Teste Fullstack Kabum - Ronni Novello</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-2" href="/home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/cliente">Cliente</a></li>                                                
                <li class="nav-item"><a class="nav-link" href="/usuario">Usuario</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="/sobre">Sobre o Projeto</a></li>
                <li class="nav-item"><a class="nav-link" href="/contato">Contato Dev.</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Banner -->
<header class="bg-primary text-white text-center py-5">
    <h1>Bem-vindo ao meu teste para a Kabum</h1>
    <p>PHP: Portal Administrativo! </p>
    <a href="#" class="btn btn-light">Portal Administrativo</a>
</header>


<!-- Rodapé -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 16/03/2025 - Todos os direitos reservados <a target="_BLANK" href="https://rcndev.com.br/">rcndev.com.br.</a></p>
    <p><a href="https://www.comofazerinformatica.com.br/politica_privacidade" _target="_BLANK" class="text-white">Política de Privacidade</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
