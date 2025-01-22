<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./../../../global.css">
</head>
<body class="flex justify-center items-center w-screen h-screen">
    <form action="../../../backend/router/userRouter.php?acao=cadastrar" method="POST">
        <div class="flex flex-col gap-4">
            <input type="text" name="nome" placeholder="Nome de usuário" class="btn">
            <input type="email" name="email" placeholder="Digite seu email" class="btn">
            <input type="password" name="senha" placeholder="Digite sua senha" class="btn"> 
            <input type="number" name="telefone" placeholder="Digite um telefone válido" class="btn"> 
            <button type="submit" class="btn flex justify-center items-center bg-emerald-300">Criar Conta</button>
        </div>
    </form>
</body>
</html>