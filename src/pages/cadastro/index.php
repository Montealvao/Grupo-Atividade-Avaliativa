<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../backend/router/userRouter.php?acao=cadastrar" method="post">
        <input type="hidden" name="id">
        <input type="text" name="nome" placeholder="Nome de usuário">
        <input type="email" name="email" placeholder="Digite seu email">
        <input type="password" name="senha" placeholder="Digite sua senha">
        <input type="number" name="telefone" placeholder="Digite um telefone válido">
        <button type="submit">Criar Conta</button>
    </form>
</body>
</html>