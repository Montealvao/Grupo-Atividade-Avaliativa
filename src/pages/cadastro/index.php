<?php
    include  __DIR__ . "/../../backend/controller/userController.php";
    $userController = new UserController();

    $usuario = [
        'id' => "",
        'nome' => "",
        'email' => "",
        'senha' => "",
        'telefone' => ""
    ];

    $acao = "cadastrar";
    $buttonTitle = "Criar Conta";
    if (isset($_GET["id"])){
        $acao = "edit";
        $buttonTitle = "Confirmar mudanças";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../backend/router/userRouter.php?action=<?php echo $acao ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
        <input type="text" name="nome" placeholder="Nome de usuário" value="<?php echo $usuario['nome']?>">
        <input type="email" name="email" placeholder="Digite seu email" value="<?php echo $usuario['email']?>">
        <input type="password" name="senha" placeholder="Digite sua senha" value="<?php echo $usuario['senha']?>">
        <input type="number" name="telefone" placeholder="Digite um telefone válido" value="<?php echo $usuario['telefone']?>">
        <button type="submit"><?php echo $buttonTitle ?></button>
    </form>

</body>
</html>