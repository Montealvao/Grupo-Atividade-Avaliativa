<?php 
session_start();
if (isset($_SESSION['id_usuario'])){
    header("location: ../home/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <div class="form-container">
        <form action="../../../backend/router/loginRouter.php?action=validarLogin" method="POST">
            <h2>Criar Conta</h2>
            <p>Preencha os dados para se cadastrar</p>
            <div class="botoes-login">
                <div>
                    <label class="label">Email</label>
                    <input type="text" placeholder="Email" name="email" class="btn">
                </div>
                <div>
                    <label class="label">Senha</label>
                    <input type="password" placeholder="Senha" name="senha" class="btn">
                </div>
                <button type="submit" class="btn">Logar</button>
                <p style="color: #8899A8; font-size: large;">Não tem conta? <a href="../cadastro/index.php" style="color: #5685EB; text-decoration: none;">Criar</a></p>
            </div>  
        </form>
    </div>
</body>
</html>