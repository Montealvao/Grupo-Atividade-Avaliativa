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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form-container">
        <form action="../../../backend/router/loginRouter.php?acao=validarLogin" method="POST">
            <div class="botoes-login">
                <div>
                    <div class="label">
                        <i class="fas fa-envelope icon"></i>    
                        <label class="label">Email</label>
                    </div>
                    <input type="email" name="email" placeholder="Digite seu email" class="btn">
                </div>
                <button type="submit" class="btn">Entrar</button>
            </div>  
        </form>
    </div>
</body>
</html>