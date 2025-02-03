<!-- <?php 
session_start();
if (isset($_SESSION['id_usuario'])){
    header("location: ../home/index.php");
}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./cadastro.css">
</head>
<body>
    <div class="form-container">
        <form action="../../../backend/router/userRouter.php?acao=cadastrar" method="POST">
            <div class="cabecalho-cadastro">
                <h2>Criar Conta</h2>
                <p>Preencha os dados para se cadastrar</p>
            </div>    
            <div class="botoes-cadastro">
                <div>
                    <div class="label">
                        <i class="fas fa-user icon"></i>
                        <label class="label">Nome Completo</label>
                    </div>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" class="btn">
                </div>
                <div>
                    <div class="label">
                        <i class="fas fa-envelope icon"></i>    
                        <label class="label">Email</label>
                    </div>
                    <input type="email" name="email" placeholder="Digite seu email" class="btn">
                </div>
                <div>
                    <div class="label">
                        <i class="fas fa-lock icon"></i>
                        <label class="label">Senha</label>
                    </div>
                    <input type="password" name="senha" placeholder="Digite sua senha" class="btn">     
                </div>
                <div>
                    <div class="label">
                        <i class="fas fa-phone icon"></i>
                        <label class="label">Telefone</label>
                    </div>
                    <input type="tel" name="telefone" placeholder="Digite um telefone válido" class="btn"> 
                </div>
                <button type="submit" class="btn">Criar Conta</button>
                <p style="color: #d1d5db; font-size: large;">Já tem conta? <a href="../login/login.php" style="color: #5685EB; text-decoration: none;">Entrar</a></p>
            </div>
        </form>
    </div>
</body>
</html>