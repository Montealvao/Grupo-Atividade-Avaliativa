<?php
session_start();
$logado = isset($_SESSION['id_usuario']);
$foto_perfil = isset($_SESSION['foto_perfil']) ? $_SESSION['foto_perfil'] : '../../../public/icons/perfil.svg';

include __DIR__ . "/../../../backend/controller/userController.php";
$userController = new userController();

$espacos = $userController->listarEspacoCadastrado();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="H-esquerdo">
            <h2>Início</h2>
            <h2>Explorar</h2>
            <h2>Sobre</h2> 
        </div>
        <div class="H-direito">
            <?php if ($logado): ?>
                <a href="../perfil/perfil.php">
                    <img src="../../../public/icons/perfil.svg" alt="Perfil" class="icone-perfil">
                </a>
            <?php else: ?>
                <a href="../login/login.php" class="H-botoes"><button>Entrar</button></a>
                <a href="../cadastro/index.php" class="H-botoes"><button>Cadastrar-se</button></a>
            <?php endif; ?>
        </div>
    </header>

    <div class="carrosel">
        <div class="imagens">
            <img src="../../../public/images/carrosel-1.jpg" alt="Restaurante 1">
            <img src="../../../public/images/carrosel-2.jpg" alt="Restaurante 2">
        </div>
        <div class="dots">
            <span class="dot" onclick="ImagemAtual(1)"></span>
            <span class="dot" onclick="ImagemAtual(2)"></span>
        </div>
    </div>

    <div class="controle">
        <?php   
        foreach ($espacos as $itens){
        echo "<div class='controle-restaurante'>
                <div class='imagem-restaurante'>
                    <img src='../../../public/images/carrosel-1.jpg' alt='{$itens['nome']}'>
                </div>
                <div class='label-restaurante'>
                    <label>Nome: {$itens['nome']}</label>
                    <label>Capacidade: {$itens['capacidade']}</label>
                    <label>Descrição: {$itens['descricao']}</label>                                    
                </div>
                <form action='../agendar/index.php' method='GET'>
                    <input type='hidden' name='id_espaco' value='{$itens['id']}'>
                    <button type='submit' class='btn'>Realizar reserva</button>
                </form>
            </div>";
        }
        ?>
    </div>
    <script src="script.js"></script>
</body>
</html>