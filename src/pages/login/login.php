<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./login.css">
</head>
<div class="campo-login">
        <img src="../../../public/images/imagem-cadastro.svg" alt="imagem cadastro">
        <div class="form-container">

            <form action="../../../backend/router/loginRouter.php?action=validarLogin" method="POST">
        <img src="../../../public/icons/logo.svg" alt="logo">
        <div class="botoes-login">
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
    </div>
</body>
</html>
<style>

*{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}

body{
    background-color: black;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container {
    height: 750px;
    display: flex;
    flex: 1;
    justify-content: center;
}

.form-container form{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 3rem;
    background-color: #1E1E1E;
    border-radius: 0.5rem;

}   

img{
    width: 52rem;
}

.campo-cadastro{
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 0.1rem gray solid;
    width: 70%;
}

.botoes-cadastro{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
}
form img{
    width: 6rem;
    margin-bottom: 4rem ;
}
.btn{
    padding-left: 0.5rem;
    border: 0.1rem #9CA3AF solid;
    border-radius: 0.5rem;
    width: 20.5rem;
    height: 2.8rem;
    font-size: medium;
}

.btn::placeholder{
    color: #CED4DA;
}

.btn:nth-child(3){
    background-color:  #13C296;
    margin-top: 2rem;
    width: 21.2rem;
    height: 3.1rem;
    color: white;
    cursor: pointer;
}
.label{
    display: block;
    color: white;
    margin-bottom: 0.8rem;
}
</style>