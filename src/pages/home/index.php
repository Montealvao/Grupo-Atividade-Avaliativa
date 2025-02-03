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
    <title>Sabores Online</title>
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
                    <img src="<?php echo !empty($usuario['foto_perfil']) ? "/" . $usuario['foto_perfil'] : $foto_perfil; ?>" alt="Perfil" class="icone-perfil">
                </a>
            <?php else: ?>
                <a href="../login/login.php" class="H-botoes"><button>Entrar</button></a>
                <a href="../cadastro/index.php" class="H-botoes"><button>Cadastrar-se</button></a>
            <?php endif; ?>
        </div>
    </header>

    <div class="carrosel">
        <div class="imagens">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&q=80" alt="Restaurante 1">
            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&q=80" alt="Restaurante 2">
        </div>
        <div class="dots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </div>

    <div class="controle">
        <?php   
        foreach ($espacos as $itens){
            echo "<div class='controle-restaurante'>
                    <div class='imagem-restaurante'>
                        <img src='https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&q=80' alt='{$itens['nome']}'>
                    </div>
                    <div class='label-restaurante'>
                        <label>Nome: {$itens['nome']}</label>
                        <label>Capacidade: {$itens['capacidade']}</label>
                        <label>Descrição: {$itens['descricao']}</label>                                    
                    </div>
                    <form action='../pagina_feita_por_ia/index.php' method='GET'>
                        <input type='hidden' name='id_espaco' value='{$itens['id']}'>
                        <button type='submit' class='btn'>Realizar reserva</button>
                    </form>
                </div>";
        }
        ?>
    </div>

    <!-- <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer> -->

    <script src="script.js"></script>
</body>
</html>