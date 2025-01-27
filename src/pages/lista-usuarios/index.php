<?php 
    session_start();
    if (!isset($_SESSION['id_usario']) || $_SESSION['id_usario'] !=1){
        header("location: ../home/index.php");
        exit();
    }

    include __DIR__ . "/../../../backend/controller/userController.php";
    $userController = new userController();
    
    $usuarioLimite = 8;
    
    $totalUsarios = count($userController->PegarTodosUsuarios());
    
    $totalPaginas = ceil($totalUsarios / $usuarioLimite);
    
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    
    $indiceInicial = ($paginaAtual - 1) * $usuarioLimite;
    
    $usuarios = $userController->PegarUsuariosPorPagina($indiceInicial, $usuarioLimite);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <div class="H-esquerdo">
        <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
            <h2>Explorar</h2>
            <h2>Sobre</h2>
        </div>
    </header>    
    <div class="controle">
        <h1>Lista de usuarios</h1>
        <table class="lista-controle">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($usuarios as $itens){
                    echo "<tr>
                    <td>{$itens['id']}</td>
                            <td>{$itens['nome']}</td>
                            <td>{$itens['email']}</td>
                            <td>{$itens['telefone']}</td>
                            <td>
                                <form action='../../../backend/router/userRouter.php?acao=delete' method='POST'>
                                    <input type='hidden' name='id' value='{$itens['id']}'>
                                    <button type='submit' name='delete' class='btn'>Deletar</button>
                                </form>
                            </td>                                       
                        </tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <?php if ($paginaAtual > 1): ?>
            <a href="?pagina=<?php echo $paginaAtual - 1; ?>"><button>&laquo; Anterior</button></a>
        <?php endif; ?>
        <?php if ($paginaAtual < $totalPaginas): ?>
            <a href="?pagina=<?php echo $paginaAtual + 1; ?>"><button>Próxima &raquo;</button></a>
        <?php endif; ?>
    </div>

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

</body>
</html>