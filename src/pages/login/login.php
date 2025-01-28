<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
<div class="campo-cadastro">
        <img src="../../../public/images/imagem-cadastro.svg" alt="imagem cadastro">
        <div class="form-container">

            <form action="../../../backend/router/loginRouter.php?action=validarLogin" method="POST">
        <img src="../../../public/icons/logo.svg" alt="logo">
        <div class="botoes-cadastro">
    <div class="botoes-cadastro">
        <div>
        <label class="label">Senha</label>
        <input type="password" placeholder="Senha" name="senha" class="btn">
        </div>
        <div>
        <label class="label">email</label>
        <input type="text" placeholder="Email" name="email" class="btn">
        </div>
        <button type="submit" class="btn">Logar</button>
        <p style="color: #8899A8; font-size: large;">Não tem conta? <a href="../login/login.php" style="color: #5685EB; text-decoration: none;">Criar</a></p>
    </div>  
    </form>
    </div>
    </div>
</body>
</html>