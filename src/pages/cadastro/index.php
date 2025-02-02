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
    <title>Cadastro</title>
    <link rel="stylesheet" href="./cadastro.css">
</head>
<body>
    <div class="form-container">
        <form action="../../../backend/router/userRouter.php?acao=cadastrar" method="POST">
            <div class="botoes-cadastro">
                <div>
                    <label class="label">Nome Completo</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" class="btn">
                </div>
                <div>    
                    <label class="label">Email</label>
                    <input type="email" name="email" placeholder="Digite seu email" class="btn">
                </div>
                <div>
                    <label class="label">Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" class="btn">     
                </div>
                <div>
                    <label class="label">Telefone</label>
                    <input type="tel" name="telefone" placeholder="Digite um telefone válido" class="btn"> 
                </div>
                <button type="submit" class="btn">Criar Conta</button>
                <p style="color: #8899A8; font-size: large;">Já tem conta? <a href="../login/login.php" style="color: #5685EB; text-decoration: none;">Entrar</a></p>
            </div>
        </form>
    </div>
</body>
</html>