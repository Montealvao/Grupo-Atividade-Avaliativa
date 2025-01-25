<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>loigin</h1>
    <form action="../../../backend/router/loginRouter.php?action=validarLogin" method="POST">
        <input type="password" placeholder="Senha" name="senha">
        <input type="text" placeholder="Email" name="email">
        <button type="submit">Logar</button>
    </form> 
</body>
</html>