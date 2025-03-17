
<?php

    require_once __DIR__ . '/header.php';

?>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card shadow-lg p-4" style="width: 350px;">
    <h3 class="text-center">Login</h3>
    
    <form method="POST" action="/login">
        <div class="mb-3">
            <label class="form-label">Login</label>
            <input type="text" name="cd_login" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="ds_senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>

</body>
<?php
    require_once __DIR__ . '/footer.php';

?>