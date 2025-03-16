
<?php
    //echo json_encode(["Login" => " PHP!", "data" => date("d/m/Y H:i:s")]);
?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card shadow-lg p-4" style="width: 350px;">
    <h3 class="text-center">Login</h3>
    
    <form method="POST" action="/login">
        <div class="mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" name="usuario"  value="40591386810" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>

</body>
</html>