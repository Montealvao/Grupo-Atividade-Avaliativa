<?php 
    session_start();
    if (!isset($_SESSION['id_usuario'])){
        header("location: ../home/index.php");
    }

    include __DIR__ . "/../../../backend/controller/userController.php";
    $userController = new userController();

    $usuario = $userController->PegarUsuarioPorId($_SESSION['id_usuario']);
    if(!$usuario){
        echo "Usuário não encontrado";
        exit();
    }

    if(isset($_GET["sucesso"])) {
        echo "
        <script>
            alert('Mudanças aplicadas')
            location.href = './perfil.php'
        </script>
        ";
    }

    $id_usuario = $_SESSION['id_usuario'];
    $foto_perfil = isset($_SESSION['foto_perfil']) ? $_SESSION['foto_perfil'] : '../../../public/icons/perfil.svg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./perfil.css">
</head>
<body>
    <header>
        <div class="H-esquerdo">
            <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none;">Início</a></h2>
            <h2> <a href="../reservas/reserva.php" style="text-decoration: none;" >Reservas</a></h2>
            <?php  if ($id_usuario == 1):  ?>
                <h2> <a style="text-decoration: none;" href="../lista-usuarios/index.php">Admin</a> </h2>
            <?php  endif;?>
        </div>
        <h2><a href="./logout.php">Logout</a></h2>
    </header>
   
    <div class="container">
            <div class="perfil-imagem">
                <form action="../../../backend/router/userRouter.php?acao=editar_foto" method="POST" enctype="multipart/form-data" id="imagemPerfil">
                    <label for="fotoPerfil">
                        <img src="../../../public/icons/perfil.svg" style="cursor: pointer;" alt="Perfil">
                    </label>
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    <input type="file" name="foto_perfil" style="display: none;" id="fotoPerfil">
                </form>
            </div>

        <form action="../../../backend/router/userRouter.php?acao=editar" method="POST">
            <div class="botoes-editar">
                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                <div>
                    <label style="display: block;">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $usuario['nome'] ?>" class="btn">
                </div>
                <div>
                    <label style="display: block;">Email:</label>
                    <input type="email" name="email" value="<?php echo $usuario['email'] ?>" class="btn">
                </div>
                <div>
                    <label style="display: block;">Senha:</label>
                    <input type="password" name="senha" value="<?php echo $usuario['senha'] ?>" class="btn">
                </div>
                <div>
                    <label style="display: block;">Telefone:</label>
                    <input type="tel" name="telefone" value="<?php echo $usuario['telefone'] ?>" class="btn">
                </div>
                <button type="submit" class="btn">Confirmar mudanças</button>
            </div>
        </form>
    </div>
    <script>
    
    </script>
</body>
</html>